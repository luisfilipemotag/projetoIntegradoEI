package biz.intro;

import android.app.Notification;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.os.Build;
import android.support.annotation.RequiresApi;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;



import android.content.Intent;
import android.os.CountDownTimer;
import android.view.View;
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

public class MainActivity extends AppCompatActivity {
    private static final String CHANNEL_ID = "yesbaby";
    String Resposta, P, M ,Respostan;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        SharedPreferences prefa = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
/*******************************/

/*****************************/


        if (prefa.contains("mail") && prefa.contains("pass")) {
            SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode

            P = pref.getString("pass", null);
            M = pref.getString("mail", null);
            novasnotificacoes();




            new CountDownTimer(2000, 1000) {
                public void onTick(long millisUntilFinished) {

                }

                public void onFinish() {


                    if (isNetworkAvailable()) {

                        post();

                    } else {

                        Toast toast = Toast.makeText(getApplicationContext(), "No internet conection", Toast.LENGTH_LONG);
                        toast.show();
                    }

                }
            }.start();
        } else {


            new CountDownTimer(1000, 1000) {

                public void onTick(long millisUntilFinished) {

                }

                public void onFinish() {
                    if (isNetworkAvailable()) {
                        Intent i = new Intent(getBaseContext(), login.class);
                        startActivity(i);
                        overridePendingTransition(R.anim.fadein, R.anim.fadeout);
                        finish();

                    } else {

                        Toast toast = Toast.makeText(getApplicationContext(), "No internet conection", Toast.LENGTH_LONG);
                        toast.show();
                    }
                }
            }.start();
        }
    }


    private void post() {

        String url = "http://193.137.7.33/~estgv16799/API4Pint/login.php";

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
                        JSONArray f;
                        try {

                            jsonArray = r.getJSONArray("login");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");


                                Toast toast = Toast.makeText(getApplicationContext(), Resposta, Toast.LENGTH_LONG);
                                toast.show();
                                if (Resposta.equals("Login efetuado com sucesso !")) {

                                    finishAffinity();
                                    Intent s = new Intent(getBaseContext(), wallet.class);
                                    startActivity(s);
                                    finish();
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
                params.put("mail", M);
                params.put("pass", P);

                return params;

            }
        };
        if (isNetworkAvailable()) {

            RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
            queue.add(postReq);

        } else {

            Toast toast = Toast.makeText(getApplicationContext(), "No internet conection", Toast.LENGTH_LONG);
            toast.show();
        }


    }

    private boolean isNetworkAvailable() {
        ConnectivityManager connectivityManager
                = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
        return activeNetworkInfo != null && activeNetworkInfo.isConnected();
    }




    private void createNotificationChannel() {
        // Create the NotificationChannel, but only on API 26+ because
        // the NotificationChannel class is new and not in the support library
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
            CharSequence name ="ola";
            String description = "muito bom";
            int importance = NotificationManager.IMPORTANCE_HIGH;
            NotificationChannel channel = new NotificationChannel(CHANNEL_ID, name, importance);
            channel.setDescription(description);
            // Register the channel with the system; you can't change the importance
            // or other notification behaviors after this
            NotificationManager notificationManager = getSystemService(NotificationManager.class);
            notificationManager.createNotificationChannel(channel);
        }
    }


    private  void novasnotificacoes (){
      final Intent a = new Intent(getApplicationContext(),notificacoes.class);
        String url ="http://193.137.7.33/~estgv16799/API4Pint/contanotificacoes.php";

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

                            jsonArray =r.getJSONArray("Notificacoes");
                            for ( int i=0 ; i< jsonArray.length() ; i++){
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Respostan =cliente.getString("resposta");
                              /*  Toast toast = Toast.makeText(getApplicationContext(), Respostan, Toast.LENGTH_LONG);
                                toast.show();*/
                              if (!Respostan.equals("Erro")) {
                                  createNotificationChannel();
                                  NotificationCompat.Builder builder = new NotificationCompat.Builder(getApplicationContext(), CHANNEL_ID)
                                          .setSmallIcon(R.mipmap.ic_launcher)
                                          .setContentTitle("Biz carteira de fidelizacao")
                                          .setContentText(Respostan)
                                          .setStyle(new NotificationCompat.BigTextStyle()
                                                  .bigText(Respostan))
                                          .setPriority(NotificationCompat.PRIORITY_HIGH);

                                  TaskStackBuilder stackBuilder = TaskStackBuilder.create(getApplicationContext());
                                  stackBuilder.addNextIntentWithParentStack(a);

// Get the PendingIntent containing the entire back stack
                                  PendingIntent resultPendingIntent =
                                          stackBuilder.getPendingIntent(0, PendingIntent.FLAG_UPDATE_CURRENT);
                                  builder.setContentIntent(resultPendingIntent);
                                  NotificationManagerCompat notificationManager = NotificationManagerCompat.from(getApplicationContext());
                                  int notificationId = 2;
// notificationId is a unique int for each notification that you must define
                                  notificationManager.notify(notificationId, builder.build());

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
                params.put("mail",M);

                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);




    }

  }



