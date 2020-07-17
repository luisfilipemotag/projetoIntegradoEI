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

public class detalhescarimbo extends AppCompatActivity {
    String id ;
    String IDCarimbo,CartaoCarimbo,TítuloCarimbo,DataFimCarimbo,DescricaoCarimbo,PremioCarimbo,imgCarimbo,cor;
    TextView data  ,descricao ,premio  ,Titulo ,ctitulo ,cdata,qrcarimbo;
    ImageView ccup , qr ,filtro ;

    ProgressBar p ;
String M,Resposta;
    int a = 0;

    public final static int QRcodeWidth = 500 ;
    private static final String IMAGE_DIRECTORY = "/QRcodeDemonuts";
    Bitmap bitmap ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalhescarimbo);

        Bundle bundle = getIntent().getExtras();
        id =  bundle.getString("ID");

        data =(TextView) findViewById(R.id.datafimd);
        descricao =(TextView)findViewById(R.id.descricaod);
        premio=(TextView)findViewById(R.id.premiod);
        Titulo =(TextView)findViewById(R.id.Titulod);
        ctitulo =(TextView)findViewById(R.id.cTitulod);
        cdata=(TextView)findViewById(R.id.cdatafimd);
        ccup=(ImageView)findViewById(R.id.imgccupd);
        qr = (ImageView) findViewById(R.id.qrcodedet);
        filtro = (ImageView) findViewById(R.id.imgfiltrod);
        qrcarimbo=(TextView) findViewById(R.id.txtidcar);

        p=(ProgressBar) findViewById(R.id.progressBar3);
        final SharedPreferences pref = getApplicationContext().getSharedPreferences("Pref", 0); // 0 - for private mode
        final SharedPreferences.Editor editor = pref.edit();
        M = pref.getString("mail",null);

        post();

    }



    private  void post(){

        String url ="http://193.137.7.33/~estgv16799/API4Pint/detalhescarimbobyid.php";

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
                            jsonArray =r.getJSONArray("carimbo");
                            for ( int i=0 ; i< jsonArray.length() ; i++){

                                JSONObject cupao = jsonArray.getJSONObject(i);
                                IDCarimbo = cupao.get("id").toString();
                                CartaoCarimbo = cupao.get("ID_Cartao").toString();
                                TítuloCarimbo = cupao.get("TituloCarimbo").toString();
                                imgCarimbo = cupao.get("img").toString();
                                DataFimCarimbo  = cupao.get("DataFimCarimbo").toString();
                                DescricaoCarimbo =  cupao.get("descricao").toString();
                                PremioCarimbo =cupao.get("premio").toString();
                                cor =cupao.get("cor").toString();

                                if (!IDCarimbo.equals("n tem")) {
                                    premio.setText("PremioCarimbo");
                                    data.setText(" valido até: "+DataFimCarimbo);
                                    Titulo.setText(TítuloCarimbo);
                                    ctitulo.setText(TítuloCarimbo);
                                    cdata.setText(DataFimCarimbo);
                                    ctitulo.setTextColor(Color.parseColor(cor));
                                    cdata.setTextColor(Color.parseColor(cor));

                                    descricao.setText(DescricaoCarimbo);
                                   Picasso.get().load(imgCarimbo).resize(1110, 540).into(ccup);

                                    insertorcheck();


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
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<>();
                params.put("id",id);
                return params;

            }
        };
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);



    }


    public  void insertorcheck(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/addcarimbo2registo.php";

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
                            jsonArray = r.getJSONArray("registocarimbo");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject cliente = jsonArray.getJSONObject(i);
                                Resposta = cliente.getString("resposta");


                                switch (Integer.valueOf(Resposta)) {

                                    case 0 :filtro.setBackgroundResource(R.drawable.cupaoa);break;
                                    case 1 :filtro.setBackgroundResource(R.drawable.cupaob);break;
                                    case 2 :filtro.setBackgroundResource(R.drawable.cupaoc);break;
                                    case 3 :filtro.setBackgroundResource(R.drawable.cupaod);break;
                                    case 4 :filtro.setBackgroundResource(R.drawable.cupaoe);break;
                                    case 5 :filtro.setBackgroundResource(R.drawable.cupaof);break;
                                    case 6 :filtro.setBackgroundResource(R.drawable.cupaog);break;
                                    case 7 :filtro.setBackgroundResource(R.drawable.cupaoh);break;
                                    case 8 :filtro.setBackgroundResource(R.drawable.cupaoi);break;
                                    case 9 :filtro.setBackgroundResource(R.drawable.cupaoj);break;
                                    case 10 :filtro.setBackgroundResource(R.drawable.cupaok);
                                        String qrcode = IDCarimbo;
                                        bitmap = TextToImageEncode(qrcode);
                                        qr.setImageBitmap(bitmap);
                                        qrcarimbo.setText("cod qr:"+IDCarimbo);

                                    break;

                                    default:filtro.setBackgroundResource(R.drawable.cupaoa);

                                } p.setVisibility(View.GONE);




                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        } catch (WriterException e) {
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

    public void carimbos(View view){

        finish();
        finishAffinity();
        Intent I = new Intent(this,wallet.class);
        startActivity(I);
        overridePendingTransition(0,0);

        Intent f = new Intent(this,cupaocarimbo.class);
        f.putExtra("ID", CartaoCarimbo);
        startActivity(f);
        overridePendingTransition(0,0);


    }
}
