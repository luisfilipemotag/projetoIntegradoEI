package biz.intro.notifiaccao;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import biz.intro.R;
import biz.intro.cupao;
import biz.intro.notificacoes;

import static android.widget.Toast.LENGTH_LONG;

public class notificaadapter extends RecyclerView.Adapter<notificaadapter.viewholder>  {
    private Context ma ;
    private ArrayList<notificacao> Noti;
    public CardView cardView ;

    public notificaadapter(Context context , ArrayList<notificacao> noti ){
        ma =context ;
        Noti = noti;

    }

    @NonNull
    @Override
    public viewholder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(ma).inflate(R.layout.itemnotificacao ,viewGroup ,false);
        return new viewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull viewholder viewholder, int i) {
        final notificacao p = Noti.get(i);

        String Texto = p.getTexto();

        viewholder.Texto.setText(Texto);
        viewholder.la.setImageResource(R.drawable.cupao);

       viewholder.la.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {
               Intent i = new Intent(ma, cupao.class);
               i.putExtra("ID", p.getIdcard());
               ma.startActivity(i);
           }
       });
        viewholder.Texto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(ma, cupao.class);
                i.putExtra("ID", p.getIdcard());
                ma.startActivity(i);
            }
        });
        viewholder.btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                delete( p.getId());
            }
        });
    }


    @Override
    public int getItemCount() {
        return Noti.size();
    }

    public class viewholder extends RecyclerView.ViewHolder{
        public ImageView la;
        public TextView Texto ;
        public ImageButton btn ;

        public viewholder(@NonNull View itemView) {
            super(itemView);
            la= itemView.findViewById(R.id.imageView2);
            Texto = itemView.findViewById(R.id.testonot);
            btn = itemView.findViewById(R.id.imageButton);

        }
    }


public void delete(final int id) {



    final SharedPreferences pref = ma.getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
    final   String  M = pref.getString("mail",null);

        String url ="http://193.137.7.33/~estgv16799/API4Pint/deleteNotificacao.php";

        StringRequest postReq = new StringRequest(Request.Method.POST, url,


                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response){
                        JSONArray jsonArray = null;
                        try {
                            jsonArray = new JSONArray(response);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        JSONObject r  = null;
                        try {
                            r = new JSONObject(response);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        JSONArray f ;
                        try{
                             jsonArray =r.getJSONArray("resposta");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject resposta = jsonArray.getJSONObject(i);

                                Toast t = Toast.makeText(ma.getApplicationContext(),resposta.get("resposta").toString(),LENGTH_LONG);
                                t.show();
                                 Intent s = new Intent(ma.getApplicationContext(), notificacoes.class);
                                 ma.startActivity(s);
                                ((Activity)ma).overridePendingTransition(0,0);
                                ((Activity)ma).finish();


                            }

                        }catch (JSONException e){e.printStackTrace();}


                    }


                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {error.printStackTrace(); }
                }){
            @Override
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<>();
                params.put("mail",M);
                params.put("id", String.valueOf(id));
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(ma.getApplicationContext());
        queue.add(postReq);




    }



}

