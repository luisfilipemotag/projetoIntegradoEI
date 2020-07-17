package biz.intro;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;
import com.android.volley.Request;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

public class Register extends AppCompatActivity {
    TextView content ,erro;

    EditText fname,lname , email,telefone , pass , morada ,localidade ,codpostal;
    String Resposta;
    DatePicker datanasc ;
    RadioButton H,M ,O ;
    byte[] passcomchazinho;
    int sexo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        erro=(TextView)findViewById(R.id.txterroicker);

        fname = (EditText) findViewById(R.id.EtNome);
        lname = (EditText) findViewById(R.id.etLnome);
        email = (EditText) findViewById(R.id.EtMail);
        telefone = (EditText) findViewById(R.id.ETTele);
        datanasc = (DatePicker) findViewById(R.id.datePicker1);
        pass = (EditText) findViewById(R.id.EtPass);
        morada = (EditText) findViewById(R.id.ETmorada);
        localidade = (EditText) findViewById(R.id.etLocalidade);
        codpostal = (EditText) findViewById(R.id.ETCodpostal);
        H = (RadioButton) findViewById(R.id.outroR);
        M = (RadioButton) findViewById(R.id.fem);
        O = (RadioButton) findViewById(R.id.masc);





        Button saveme = (Button) findViewById(R.id.BtnReg);
        saveme.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                try {

                    t();




                } catch (Exception ex) {
                    Toast toast = Toast.makeText(getApplicationContext(), "Error !", Toast.LENGTH_LONG);
                    toast.show();
                }
            }
        });

    }
    private  void post (){

        String url ="http://193.137.7.33/~estgv16799/API4Pint/Register.php";

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

                            jsonArray =r.getJSONArray("registar");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta =cliente.getString("resposta");


                                Toast toast = Toast.makeText(getApplicationContext(), Resposta, Toast.LENGTH_LONG);




                                if (Resposta.equals("Registado com sucesso")){

                                    finishAffinity();
                                    Intent s = new Intent(getBaseContext(), login.class);
                                    s.putExtra("login" , Resposta);
                                    startActivity(s);
                                    finish();
                                }else {
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
                params.put("pnome",fname.getText().toString());
                params.put("unome",lname.getText().toString());
                params.put("sexo", String.valueOf(sexo));
                params.put("datanasc",datanasc.getYear()+"-"+datanasc.getMonth()+"-"+datanasc.getDayOfMonth());
                params.put("codpost",codpostal.getText().toString());
                params.put("morada",morada.getText().toString());
                params.put("localidade",localidade.getText().toString());
                params.put("contacto",telefone.getText().toString());
                params.put("mail",email.getText().toString());
                params.put("pass",bytesToHex(passcomchazinho));

                    return params;

            }
        };
            RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }


public void t (){
    boolean temerro = false;
    int   year = datanasc.getYear();
    int currentyear = Calendar.getInstance().get(Calendar.YEAR);

    if (H.isChecked()){sexo=1;}else if (M.isChecked()){sexo=2;}else if (O.isChecked()){sexo=3;}
    erro.setText("");
    if (currentyear - year <18){
            erro.setText("");
            erro.setText("menor de 18 !");
            temerro = true;
        }
    if (currentyear - year >100){

        erro.setText("idade invalida !");
        temerro = true;
    }

    if (fname.getText().toString().length() == 0) {
        fname.setError("Digite o nome!");
        temerro = true;
    }
    if (lname.getText().toString().length() == 0) {
        lname.setError("Digite o sobrenome!");
        temerro = true;
    }

    if (telefone.getText().toString().length() == 0) {
        telefone.setError("Digite o número!");
        temerro = true;
    }

    if(email.getText().toString().length() == 0){
        email.setError("Digite o email!");
        temerro = true;
    }/*
    if (!email.toString().matches("[a-zA-Z0-9._-]+@[a-z]+.[a-z]")) {

        email.setError("Email invalido!");
        temerro = true;

    }
*/
    if (codpostal.getText().toString().length() == 0) {
        codpostal.setError("Digite o cod postal!");
        temerro = true;
    }
    if (localidade.getText().toString().length() == 0) {
        localidade.setError("Digite o localidade!");
        temerro = true;
    }
    if (morada.getText().toString().length() == 0) {
        morada.setError("Digite o morada!");
        temerro = true;
    }
    if (pass.getText().toString().length() < 6) {
        pass.setError("password muito curta");
        temerro = true;
    }

    if(!temerro) {
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
















}
