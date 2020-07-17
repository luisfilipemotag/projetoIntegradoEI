package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
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

import biz.intro.insidecartao.carimboadapter;
import biz.intro.insidecartao.carimboclass;
import biz.intro.insidecartao.cupaoadapter;
import biz.intro.insidecartao.cupaoclass;

public class cupaofav extends AppCompatActivity {
    String id ,M;
    private RecyclerView mrecyclerView ;
    private cupaoadapter mcupaodapter;
    String IDCupao,ID_Cartao,TituloCupao,IMGCupao,ValeCupao,DataFimCupao,DescricaoCupao,cor;
    protected ArrayList<cupaoclass> mcupao;

    TextView vazio ;


    RadioButton confirm ;
    Button desfidelizar ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cupaofav);

        final TextView cupao = (TextView) findViewById(R.id.txtdesc);

        final TextView carimbo = (TextView) findViewById(R.id.txtcarimbofav);
        vazio =(TextView)findViewById(R.id.txtvazio5) ;

        cupao.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            cup();
        }
    });
    carimbo.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            carimbo();
        }
    });


        Bundle bundle = getIntent().getExtras();
        id =  bundle.getString("ID");
        mrecyclerView = (RecyclerView) findViewById(R.id.listafav);
        mrecyclerView.setLayoutManager(new LinearLayoutManager(this));
        mcupao = new ArrayList<>();
        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

        post();

        confirm  =(RadioButton)findViewById(R.id.rasd);
        desfidelizar =(Button)findViewById(R.id.btnfasdas);

        desfidelizar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (confirm.isChecked()){DELETE();}else{ Toast tosta = Toast.makeText(getApplicationContext(), "para desfidelizar check o butao ao lado", Toast.LENGTH_LONG);
                    tosta.show();}
            }
        });
    }



    private  void post(){
        String url ="http://193.137.7.33/~estgv16799/API4Pint/listacupfav.php";

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
                            mcupao= new ArrayList<cupaoclass>();
                            jsonArray =r.getJSONArray("cupoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cupao = jsonArray.getJSONObject(i);
                                IDCupao = cupao.get("id").toString();
                                ID_Cartao = cupao.get("ID_Cartao").toString();
                                TituloCupao = cupao.get("TituloCupao").toString();
                                IMGCupao = cupao.get("IMGCupao").toString();
                                ValeCupao = cupao.get("ValeCupao").toString();
                                DataFimCupao  = cupao.get("DataFimCupao").toString();
                                DescricaoCupao =  cupao.get("descricao").toString();
                                cor =  cupao.get("cor").toString();

                                mcupao.add(new cupaoclass(IDCupao,ID_Cartao,TituloCupao,IMGCupao,ValeCupao,DataFimCupao,DescricaoCupao , cor));
                            }
                            mcupaodapter = new cupaoadapter(cupaofav.this ,mcupao);
                            mrecyclerView.setAdapter(mcupaodapter);
                            if (mcupao.isEmpty()){mrecyclerView.setVisibility(View.GONE);}
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
                params.put("id",id);
                params.put("mail",M);
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }
    public void back(View view){

        finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);


    }
    public void carimbo(){

         finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);
        overridePendingTransition(0,0);

        Intent f = new Intent(this,cupaocarimbo.class);
        f.putExtra("ID", id);
        startActivity(f);
        overridePendingTransition(0,0);


    }
    public void cup(){
        overridePendingTransition(0,0);
        finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);
        overridePendingTransition(0,0);

        Intent f = new Intent(this,cupao.class);
        f.putExtra("ID", id);
        startActivity(f);
        overridePendingTransition(0,0);

    }
    String Resposta ;
    public  void DELETE(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/desfidelizar.php";

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
                            jsonArray = r.getJSONArray("resposta");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");


                                Toast toast = Toast.makeText(getApplicationContext(), Resposta, Toast.LENGTH_LONG);
                                toast.show();
                                wallet();

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
                params.put("id",id);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }
    public void wallet(){
        overridePendingTransition(0,0);
        finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);
        overridePendingTransition(0,0);



    }

}
