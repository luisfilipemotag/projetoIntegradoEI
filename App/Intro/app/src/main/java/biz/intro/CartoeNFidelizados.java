package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
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

import biz.intro.listcartao.NFadapter;
import biz.intro.listcartao.cartao;
import biz.intro.listcartao.cartaonf;
import biz.intro.listcartao.progadapter;


public class CartoeNFidelizados extends AppCompatActivity  {
    private SwipeRefreshLayout swipeContainer;

    private RecyclerView mrecyclerView ;
    private NFadapter nFadapter;
    private ArrayList<cartaonf> mcartas;
    private FloatingActionButton bbutun ;
    String titulo , subtitulo ,img, id ,M ,cor;
    private SearchView S ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cartoe_nfidelizados);

        mrecyclerView = (RecyclerView) findViewById(R.id.listacards);

        mrecyclerView.setHasFixedSize(true);
        mrecyclerView.setLayoutManager(new LinearLayoutManager(this));
        S =  findViewById(R.id.searchViewNF);

        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

       mcartas = new ArrayList<>();
        posat();

        mcartas.clear();
        S.setVisibility(View.INVISIBLE);
        S.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String queryString) {

                mcartas= new ArrayList<cartaonf>();

                nFadapter.notifyDataSetChanged();
                if (queryString.isEmpty()){posat();}


                search(queryString);

                return false;
            }

            @Override
            public boolean onQueryTextChange(String queryString) {
                mcartas= new ArrayList<cartaonf>();nFadapter.notifyDataSetChanged();
                if (queryString.isEmpty()){ posat();}
                search(queryString);

                return false;
            }
        });

/*********************************/

        swipeContainer = (SwipeRefreshLayout) findViewById(R.id.swipeContainer);
        // Setup refresh listener which triggers new data loading
        swipeContainer.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                // Your code to refresh the list here.
                // Make sure you call swipeContainer.setRefreshing(false)
                // once the network request has completed successfully.
                posat();
            }
        });
        // Configure the refreshing colors
        swipeContainer.setColorSchemeResources(android.R.color.holo_blue_bright,
                android.R.color.holo_green_light,
                android.R.color.holo_orange_light,
                android.R.color.holo_red_light);

    }
    public void Goqr(View view){

        Intent I = new Intent(this,qrcode.class);
        startActivity(I);

    }

    private  void posat(){
        String url ="http://193.137.7.33/~estgv16799/API4Pint/showcartoesNF.php";

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
                            mcartas= new ArrayList<cartaonf>();

                            jsonArray =r.getJSONArray("cartoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                id = cliente.get("id").toString();
                                titulo = cliente.get("titulo").toString();
                                subtitulo = cliente.get("subtitulo").toString();
                                img = cliente.get("img").toString();
                                cor = cliente.get("cor").toString();
                                mcartas.add(new cartaonf(titulo,subtitulo,img ,id,cor));
                                swipeContainer.setRefreshing(false);
                            }


                            nFadapter = new NFadapter(CartoeNFidelizados.this ,mcartas);
                            mrecyclerView.setAdapter(nFadapter);

                            if (!mcartas.isEmpty()){
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
        String url ="http://193.137.7.33/~estgv16799/API4Pint/searchNF.php";

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
                            mcartas= new ArrayList<cartaonf>();
                            jsonArray =r.getJSONArray("cartoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                id = cliente.get("id").toString();
                                titulo = cliente.get("titulo").toString();
                                subtitulo = cliente.get("subTitulo").toString();
                                img = cliente.get("imgcartao").toString();
                                cor = cliente.get("cor").toString();
                                mcartas.add(new cartaonf(titulo,subtitulo,img,id,cor));
                            }

                            nFadapter = new NFadapter(CartoeNFidelizados.this ,mcartas);
                            mrecyclerView.setAdapter(nFadapter);
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

}

