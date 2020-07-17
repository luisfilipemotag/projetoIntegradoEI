package biz.intro.listcartao;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import biz.intro.FidelizarSIMNAO;
import biz.intro.R;
import biz.intro.wallet;

import static android.widget.Toast.LENGTH_LONG;

public class NFadapter extends RecyclerView.Adapter<NFadapter.viewholder> {
    private Context ma ;
    private ArrayList<cartaonf> mcartao;
    public CardView cardView ;
    private  String id,M ,Resposta ;

    public NFadapter(Context context , ArrayList<cartaonf> cartao ){
        ma =context ;
        mcartao = cartao;

    }

    @NonNull
    @Override
    public viewholder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(ma).inflate(R.layout.list_itemnf,viewGroup ,false);
        return new viewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull viewholder viewholder, int i) {
        final cartaonf p = mcartao.get(i);
        String img = p.getImg();
        String Titulo = p.getTitulo();
        String Subtitulo = p.getSubtitulo();

        p.getId();

        viewholder.titulo.setText(Titulo);
        viewholder.subtitulo.setText(Subtitulo);
        Picasso.get().load(img).resize(1210, 666).into(viewholder.la);

        viewholder.titulo.setTextColor(Color.parseColor(p.getCor()));
        viewholder.subtitulo.setTextColor(Color.parseColor(p.getCor()));


        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                id=p.getId();
                sw();
               /* Intent i = new Intent(ma, FidelizarSIMNAO.class);
                i.putExtra("ID", id);
                ma.startActivity(i);*/


            }
        });

    }

    @Override
    public int getItemCount() {
        return mcartao.size();
    }

    public class viewholder extends RecyclerView.ViewHolder{
        public ImageView la;
        public TextView titulo ;
        public TextView subtitulo ;


        public viewholder(@NonNull View itemView) {
            super(itemView);
            la= itemView.findViewById(R.id.imgnf);
            titulo =  itemView.findViewById(R.id.Titulonf);
            subtitulo =itemView.findViewById(R.id.Subtitulonf);
            cardView =itemView.findViewById(R.id.cardidnf);


        }
    }
    public void sw(){

        AlertDialog.Builder builder = new AlertDialog.Builder(ma);
        builder.setMessage("Tem a certeza que se quer fidelizar ?")
                .setPositiveButton("Sim", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Fidelizar();
                    }
                })
                .setNegativeButton("Nao", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                });

        builder.show();

    }

    public void Fidelizar(){

        final SharedPreferences pref = ma.getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);


        String url = "http://193.137.7.33/~estgv16799/API4Pint/fidelizar.php";

        StringRequest postReq = new StringRequest(Request.Method.POST, url,


                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        JSONArray jsonArray = null;
                        try {
                            jsonArray = new JSONArray(response);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        JSONObject r = null;
                        try {
                            r = new JSONObject(response);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        try {

                            assert r != null;
                            jsonArray = r.getJSONArray("cartoes");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");
                                Toast t = Toast.makeText(ma,Resposta,LENGTH_LONG);
                                t.show();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }


                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();

                params.put("mail",M);
                params.put("idcartao" ,id);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(ma);
        queue.add(postReq);

    }
    // Clean all elements of the recycler
    public void clear() {
        mcartao.clear();
        notifyDataSetChanged();
    }

    // Add a list of items -- change to type used
    public void addAll(ArrayList<cartaonf> list) {
        mcartao.addAll(list);
        notifyDataSetChanged();
    }
}

