package biz.intro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.zxing.BarcodeFormat;
import com.google.zxing.MultiFormatWriter;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class detalhescupao extends AppCompatActivity {
String id ;
    String IDCupao,ID_Cartao,TituloCupao,IMGCupao,ValeCupao,DataFimCupao,DescricaoCupao,cor;
TextView vale ,data , cvale , ctitulo ,cdata ,cdescricao , ccodqr ;
ImageView ccup , qr ;
ImageButton fav ;
ProgressBar p ;
String M ;
    String Resposta;
    int a = 0;

    public final static int QRcodeWidth = 500 ;
    private static final String IMAGE_DIRECTORY = "/QRcodeDemonuts";
    Bitmap bitmap ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalhescupao);
        Bundle bundle = getIntent().getExtras();
        id =  bundle.getString("ID");

        vale = (TextView) findViewById(R.id.txtvale);
        data = (TextView) findViewById(R.id.txtdata);
        cvale = (TextView) findViewById(R.id.cvale);
        ctitulo = (TextView) findViewById(R.id.cTitulod);
        cdata = (TextView) findViewById(R.id.cdatafimd);
        cdescricao = (TextView) findViewById(R.id.cdesc);
        ccodqr = (TextView) findViewById(R.id.txtcodqr);
        ccup=(ImageView)findViewById(R.id.imgccupd);
        qr = (ImageView) findViewById(R.id.ivqrcode);
        fav =(ImageButton)findViewById(R.id.addtofav);
        p=(ProgressBar) findViewById(R.id.progressBar2);

        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

        fav.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {

            update();
          //  fav.setClickable(false);


    }
});
post();

       }


    private  void post(){

        String url ="http://193.137.7.33/~estgv16799/API4Pint/detalhescupaobyid.php";

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
                             jsonArray =r.getJSONArray("cupao");
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

                                if (!IDCupao.equals("n tem")) {
                                    vale.setText("Desconto de "+ValeCupao + "%");
                                    data.setText(DescricaoCupao+"\n valido até: "+DataFimCupao);

                                    cvale.setText("Vale "+ValeCupao+" %");
                                    ctitulo.setText(TituloCupao);
                                    cdata.setText(DataFimCupao);
                                    cdescricao.setText(DescricaoCupao);
                                    cvale.setTextColor(Color.parseColor(cor));
                                    ctitulo.setTextColor(Color.parseColor(cor));
                                    cdata.setTextColor(Color.parseColor(cor));
                                    cdescricao.setTextColor(Color.parseColor(cor));

                                    ccodqr.setText("Id cupao: "+IDCupao);
                                    Picasso.get().load(IMGCupao).resize(1110, 540).into(ccup);

                                    insertorcheck();
                                    String qrcode = IDCupao;
                                    bitmap = TextToImageEncode(qrcode );
                                    qr.setImageBitmap(bitmap);
p.setVisibility(View.GONE);

                                }
                            }



                        }catch (JSONException e){e.printStackTrace();} catch (WriterException e) {
                            e.printStackTrace();
                        }


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
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);



    }



    private Bitmap TextToImageEncode(String Value) throws WriterException {
        BitMatrix bitMatrix;
        try {
            bitMatrix = new MultiFormatWriter().encode(
                    Value,
                    BarcodeFormat.DATA_MATRIX.QR_CODE,
                    QRcodeWidth, QRcodeWidth, null
            );

        } catch (IllegalArgumentException Illegalargumentexception) {

            return null;
        }
        int bitMatrixWidth = bitMatrix.getWidth();

        int bitMatrixHeight = bitMatrix.getHeight();

        int[] pixels = new int[bitMatrixWidth * bitMatrixHeight];

        for (int y = 0; y < bitMatrixHeight; y++) {
            int offset = y * bitMatrixWidth;

            for (int x = 0; x < bitMatrixWidth; x++) {

                pixels[offset + x] = bitMatrix.get(x, y) ?
                        getResources().getColor(R.color.nigga):getResources().getColor(R.color.thecolor);
            }
        }
        Bitmap bitmap = Bitmap.createBitmap(bitMatrixWidth, bitMatrixHeight, Bitmap.Config.ARGB_4444);

        bitmap.setPixels(pixels, 0, 500, 0, 0, bitMatrixWidth, bitMatrixHeight);
        return bitmap;
    }


    public void cupoes(View view){

        finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);
        overridePendingTransition(0,0);

        Intent f = new Intent(this,cupao.class);
        f.putExtra("ID", ID_Cartao);
        startActivity(f);
        overridePendingTransition(0,0);


    }

    public  void update(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/add2fav.php";

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
                            jsonArray = r.getJSONArray("add2fav");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                              String  answer = cliente.getString("resposta");


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
                if (a==1){a=0; params.put("fav", String.valueOf(0));}
                else if (a==0){a=1; params.put("fav", String.valueOf(1));}




                params.put("mail", M);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

        if (a == 1 ){

            fav.setImageResource(R.drawable.favoritono);
        }else { fav.setImageResource(R.drawable.favoritoyes);

        }

    }

    public  void insertorcheck(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/addcupaoaregisto.php";

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
                            jsonArray = r.getJSONArray("registocupao");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                 Resposta = cliente.getString("resposta");



                                a = Integer.valueOf(Resposta);
                                if (a == 1 ){

                                    fav.setImageResource(R.drawable.favoritoyes);
                                }else { fav.setImageResource(R.drawable.favoritono);

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
                params.put("mail",M);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }

}


