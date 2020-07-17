package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

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

import biz.intro.notifiaccao.notificaadapter;
import biz.intro.notifiaccao.notificacao;

public class notificacoes extends AppCompatActivity {


    private RecyclerView mrecyclerView ;
    private notificaadapter madapertnot;

    protected ArrayList<notificacao> mnotificacao;
     String texto ,idcard ;
     int id , img ;
     String M;
     TextView vazio ;
    
    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {

            switch (item.getItemId()) {
                case R.id.navigation_dashboard:
                    Intent I1 =new Intent(notificacoes.this ,wallet.class);
                    startActivity(I1);
                    overridePendingTransition(0,0);
                    finish();
                    break;

                case R.id.navigation_home:
                    Intent I2 =new Intent(notificacoes.this ,Maps.class);
                    startActivity(I2);
                    overridePendingTransition(0,0);
                    finish();
                    break;
                case R.id.navigation_notifications:

                    break;
                case R.id.navigation_config:
                    Intent I4 =new Intent(notificacoes.this ,configuracoes.class);
                    startActivity(I4);
                    overridePendingTransition(0,0);
                    finish();
                    break;


            }
            return false;
        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notificacoes);

        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setSelectedItemId(R.id.navigation_notifications);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);
/**********************************************************************/

        mrecyclerView = (RecyclerView) findViewById(R.id.notirecycl);
        mrecyclerView.setHasFixedSize(true);
        mrecyclerView.setLayoutManager(new LinearLayoutManager(this));
         final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

        vazio =(TextView) findViewById(R.id.txtvazio);
        mnotificacao = new ArrayList<>();

        post();
        mnotificacao.clear();



    }





    private  void post(){
        String url ="http://193.137.7.33/~estgv16799/API4Pint/notifaicacoes.php";

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
                            mnotificacao= new ArrayList<notificacao>();
                            jsonArray =r.getJSONArray("Notificacoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);

                               if (!cliente.get("id").toString().equals("n tem")){
                                id =Integer.valueOf( cliente.get("id").toString());
                                texto = cliente.get("Mensagem").toString();
                                idcard = cliente.get("idcard").toString();

                                mnotificacao.add(new notificacao(texto,idcard ,id));}
                            }
                            madapertnot = new notificaadapter(notificacoes.this ,mnotificacao);
                            mrecyclerView.setAdapter(madapertnot);
                            if (mnotificacao.isEmpty()){mrecyclerView.setVisibility(View.GONE);}
                            vazio.setVisibility(View.GONE);
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
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }


}
