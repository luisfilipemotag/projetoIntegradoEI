package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Switch;
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

import java.util.HashMap;
import java.util.Map;

public class configuracoes extends AppCompatActivity {

    EditText CodPost,morada, loca;
    TextView nome ;
    String Resposta, CodPostt, locat, moradat, nomet ,M;
    Switch switch1 ;
    Button sobre ,logout;

    boolean temerro ;



    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {

            switch (item.getItemId()) {
                case R.id.navigation_dashboard:
                    Intent I1 = new Intent(configuracoes.this, wallet.class);
                    startActivity(I1);
                    overridePendingTransition(0, 0);
                    finish();
                    break;

                case R.id.navigation_home:
                    Intent I2 = new Intent(configuracoes.this, Maps.class);
                    startActivity(I2);
                    overridePendingTransition(0, 0);
                    finish();
                    break;
                case R.id.navigation_notifications:
                    Intent I3 = new Intent(configuracoes.this, notificacoes.class);
                    startActivity(I3);
                    overridePendingTransition(0, 0);
                    finish();
                    break;
                case R.id.navigation_config:

                    break;


            }
            return false;
        }
    };




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_configuracoes);

        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setSelectedItemId(R.id.navigation_config);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);

        /*****************************************************************/

        CodPost = (EditText) findViewById(R.id.cpostal);
        morada = (EditText) findViewById(R.id.mora);
        loca = (EditText) findViewById(R.id.local);
        nome = (TextView) findViewById(R.id.txtNome);
        switch1 =(Switch) findViewById(R.id.switch1);
        logout = (Button) findViewById(R.id.btn_logout);
        sobre =(Button) findViewById(R.id.btn_info);
        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

        post();

        switch1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (switch1.isChecked()){
                CodPost.setEnabled(true);
                morada.setEnabled(true);
                loca.setEnabled(true);


                }

                if (!switch1.isChecked()){
                    if (CodPost.getText().toString().length() == 0) {
                        CodPost.setError("campo tem de estar preenchido");
                        temerro = true;
                    }
                    if (morada.getText().toString().length() == 0) {
                        morada.setError("campo tem de estar preenchido");
                        temerro = true;
                    }

                    if (loca.getText().toString().length() == 0) {
                        loca.setError("campo tem de estar preenchido");
                        temerro = true;
                    }
                    if(!temerro){

                    update();}
                    else {
                        switch1.setChecked(true);
                        temerro=false;
                    }


                }
            }
        });


        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                editor.clear();
                editor.commit();
                finishAffinity();
                Intent s = new Intent(getBaseContext(), login.class);
                startActivity(s);
                finish();

            }
        });

        sobre.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent s = new Intent(getBaseContext(), SobreAPP.class);
                startActivity(s);

            }
        });




    }



    public  void post(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/showuser.php";

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
                            jsonArray = r.getJSONArray("userdata");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");

                                CodPostt = cliente.getString("codpost");
                                moradat = cliente.getString("morada");
                                locat = cliente.getString("loca");
                                nomet = cliente.getString("nome");

                                if (Resposta.equals("yes")) {
                                    nome.setText("Olá "+nomet + " !");
                                    CodPost.setHint(CodPostt);
                                    morada.setHint(moradat);
                                    loca.setHint(locat);

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

                params.put("mail",M);

                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }


    public  void update(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/updateuser.php";

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
                            jsonArray = r.getJSONArray("update");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");


                                Toast toast = Toast.makeText(getApplicationContext(), Resposta, Toast.LENGTH_LONG);
                                toast.show();

                                if (Resposta.equals("Atualizado com sucesso")){

                                    post();

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

                params.put("mail",M);
                params.put("codpost",CodPost.getText().toString());
                params.put("morada",morada.getText().toString());
                params.put("local",loca.getText().toString());

                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }


    }






















