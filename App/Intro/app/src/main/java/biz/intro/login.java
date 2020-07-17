package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.CountDownTimer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.InputType;
import android.text.method.PasswordTransformationMethod;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
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

import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.HashMap;
import java.util.Map;

public class login extends AppCompatActivity {
        String Resposta ;
        byte[] passcomchazinho;
        EditText mail , pass ;
        Button log ;
        RadioButton lembrar ;
ImageButton visible ;
int help ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);




        lembrar = (RadioButton) findViewById(R.id.lembrar);

        mail = (EditText) findViewById(R.id.InEmail);
        pass = (EditText) findViewById(R.id.InPass);
        log = (Button) findViewById(R.id.BtnLogin) ;
        pass.setTransformationMethod(PasswordTransformationMethod.getInstance());
        help =pass.getInputType();
        log.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                MessageDigest digest = null;
                try {
                    digest = MessageDigest.getInstance("sha256");
                } catch (NoSuchAlgorithmException e) {
                    e.printStackTrace();
                }

                passcomchazinho = digest.digest(
                        pass.getText().toString().getBytes(StandardCharsets.UTF_8));
                post();
            }
        });
        Bundle bundle = getIntent().getExtras();
        if (bundle!=null) {
        if(bundle.containsKey("login")) {
            TextView info = (TextView)findViewById(R.id.info);
            info.setText(bundle.getString("login"));
        }
        }

    }



    private  void post (){

        String url ="http://193.137.7.33/~estgv16799/API4Pint/login.php";

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

                            jsonArray =r.getJSONArray("login");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta =cliente.getString("resposta");
                                SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
                                SharedPreferences.Editor editor = pref.edit();



                                if (Resposta.equals("Login efetuado com sucesso !")){
                                    editor.putString("mail", mail.getText().toString());

                                    if (lembrar.isChecked()){

                                    editor.putString("pass",bytesToHex(passcomchazinho));

                                    }
                                    editor.apply();
                                    finishAffinity();
                                    Intent s = new Intent(getBaseContext(), wallet.class);
                                    startActivity(s);
                                    finish();
                                }else   {
                                    Toast toast = Toast.makeText(getApplicationContext(), Resposta, Toast.LENGTH_LONG);
                                    toast.show();

                                }

                            }

                        }catch (JSONException e){e.printStackTrace();}
                    }


                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {error.printStackTrace(); }
                }){
            @Override
            protected Map<String,String> getParams(){
                Map<String,String> params = new HashMap<>();
                 params.put("mail",mail.getText().toString());
                 params.put("pass",bytesToHex(passcomchazinho));

                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }


    private static String bytesToHex(byte[] hash) {
        StringBuffer hexString = new StringBuffer();
        for (int i = 0; i < hash.length; i++) {
            String hex = Integer.toHexString(0xff & hash[i]);
            if(hex.length() == 1) hexString.append('0');
            hexString.append(hex);
        }
        return hexString.toString();
    }

    public void GoReg(View view){
        Intent I = new Intent(this,Direitosdeutilizacao.class);
        startActivity(I);

    }


}
