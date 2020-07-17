package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.SearchView;

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

import biz.intro.listcartao.cartao;

import biz.intro.listcartao.progadapter;

public class wallet extends AppCompatActivity  {

private RecyclerView mrecyclerView ;
private progadapter mprogadapter;

protected ArrayList<cartao> mcartao;
private SearchView S ;
private ImageView imga;
    String titulo , subtitulo ,img ,M ,id , cor;
    private SwipeRefreshLayout swipeContainer;



    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {

            switch (item.getItemId()) {
                case R.id.navigation_dashboard:

                    break;

                case R.id.navigation_home:
                    Intent I2 =new Intent(wallet.this ,Maps.class);
                    startActivity(I2);
                    overridePendingTransition(0,0);
                    finish();
                    break;
                case R.id.navigation_notifications:
                    Intent I3 =new Intent(wallet.this ,notificacoes.class);
                    startActivity(I3);
                    overridePendingTransition(0,0);
                    finish();
                    break;
                case R.id.navigation_config:
                    Intent I4 =new Intent(wallet.this ,configuracoes.class);
                    startActivity(I4);
                    overridePendingTransition(0, 0);
                    finish();
                    break;


            }
            return false;
        }
    };



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wallet);

        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setSelectedItemId(R.id.navigation_dashboard);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);

/**********************************************************************/
        mrecyclerView = (RecyclerView) findViewById(R.id.listacard);
        mrecyclerView.setHasFixedSize(true);
        mrecyclerView.setLayoutManager(new LinearLayoutManager(this));
        S =  findViewById(R.id.searchView);

        imga = (ImageView) findViewById(R.id.imageView4);

        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);


        mcartao = new ArrayList<>();

        post();
        mcartao.clear();
        S.setVisibility(View.INVISIBLE);
        S.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String queryString) {

                mcartao= new ArrayList<cartao>();

                mprogadapter.notifyDataSetChanged();
                if (queryString.isEmpty()){post();}


                search(queryString);

                return false;
            }

            @Override
            public boolean onQueryTextChange(String queryString) {
                mcartao= new ArrayList<cartao>();mprogadapter.notifyDataSetChanged();
                if (queryString.isEmpty()){ post();}
                search(queryString);

                return false;
            }
        });


        /********************************/
        swipeContainer = (SwipeRefreshLayout) findViewById(R.id.swipeContainer);
        // Setup refresh listener which triggers new data loading
        swipeContainer.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                // Your code to refresh the list here.
                // Make sure you call swipeContainer.setRefreshing(false)
                // once the network request has completed successfully.
                post();
            }
        });
        // Configure the refreshing colors
        swipeContainer.setColorSchemeResources(android.R.color.holo_blue_bright,
                android.R.color.holo_green_light,
                android.R.color.holo_orange_light,
                android.R.color.holo_red_light);



    }

    private  void post(){
        String url ="http://193.137.7.33/~estgv16799/API4Pint/showcartoesfidelizados.php";

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
                            mcartao= new ArrayList<cartao>();
                            jsonArray =r.getJSONArray("cartoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                id = cliente.get("id").toString();
                                titulo = cliente.get("titulo").toString();
                                subtitulo = cliente.get("subTitulo").toString();
                                img = cliente.get("imgcartao").toString();
                                cor = cliente.get("cor").toString();
                                mcartao.add(new cartao(titulo,subtitulo,img,id,cor));
                                swipeContainer.setRefreshing(false);
                            }
                        mprogadapter = new progadapter(wallet.this ,mcartao);
                            mrecyclerView.setAdapter(mprogadapter);
                            if (mcartao.isEmpty()){
                                mrecyclerView.setVisibility(View.INVISIBLE);
                                imga.setVisibility(View.VISIBLE);
                            }else {
                                imga.setVisibility(View.GONE);
                                S.setVisibility(View.VISIBLE);


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
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }


    private  void search(final String query){
        String url ="http://193.137.7.33/~estgv16799/API4Pint/search.php";

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
                            mcartao= new ArrayList<cartao>();
                            jsonArray =r.getJSONArray("cartoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                id = cliente.get("id").toString();
                                titulo = cliente.get("titulo").toString();
                                subtitulo = cliente.get("subTitulo").toString();
                                img = cliente.get("imgcartao").toString();
                                cor = cliente.get("cor").toString();
                                mcartao.add(new cartao(titulo,subtitulo,img,id,cor));
                            }

                            mprogadapter = new progadapter(wallet.this ,mcartao);
                            mrecyclerView.setAdapter(mprogadapter);
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
                params.put("search",query);
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }

    public void GoReg(View view){

        Intent I = new Intent(this,CartoeNFidelizados.class);
        startActivity(I);

    }


}
