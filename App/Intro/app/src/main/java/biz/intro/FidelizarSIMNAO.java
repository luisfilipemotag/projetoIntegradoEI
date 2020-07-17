package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
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

import java.util.HashMap;
import java.util.Map;

import static android.widget.Toast.LENGTH_LONG;

public class FidelizarSIMNAO extends AppCompatActivity {
String id ,M;
 String titulo , subtitulo ,img ,cor;
 TextView t, st ;
 ImageView imgc ;
 String Resposta ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fidelizar_simnao);
        Bundle bundle = getIntent().getExtras();
      id=  bundle.getString("ID");
        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);
        t = (TextView) findViewById(R.id.Tituloc);
        st =(TextView) findViewById(R.id.Subtituloc);
        imgc =(ImageView) findViewById(R.id.imgccupd);
post();
    }

    public  void post(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/showcard.php";

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
                                id = cliente.get("id").toString();
                                titulo = cliente.get("titulo").toString();
                                subtitulo = cliente.get("subtitulo").toString();
                                img = cliente.get("img").toString();
                                cor = cliente.get("cor").toString();
                                if (!id.equals("n existe")) {
                                    t.setText(titulo);
                                    st.setText(subtitulo);
                                    Picasso.get().load(img).resize(1110, 540).into(imgc);


                                }

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
                params.put("id",id);

                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }

    public void Fidelizar(View view){

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
                                Toast t = Toast.makeText(getApplicationContext(),Resposta,LENGTH_LONG);
                                t.show();
                                finish();
                                finishAffinity();
                                Intent s = new Intent(getBaseContext(), wallet
                                        .class);
                                startActivity(s);
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
        queue =(RequestQueue) Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }

public void back(View view){
        finish();
        finishAffinity();
    Intent I = new Intent(this,wallet.class);
    Intent f = new Intent(this, CartoeNFidelizados.class);
    startActivity(I);
    startActivity(f);


}
}


