package biz.intro;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static android.widget.Toast.LENGTH_LONG;

public class Maps extends FragmentActivity implements OnMapReadyCallback {
    String x,y,nome;
    private GoogleMap mMap;

    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {

            switch (item.getItemId()) {
                case R.id.navigation_dashboard:
                    Intent I1 =new Intent(Maps.this ,wallet.class);
                    startActivity(I1);
                    overridePendingTransition(0,0);
                    finish();
                    break;

                case R.id.navigation_home:

                    break;
                case R.id.navigation_notifications:
                    Intent I3 =new Intent(Maps.this ,notificacoes.class);
                    startActivity(I3);
                    overridePendingTransition(0,0);
                    finish();
                    break;
                case R.id.navigation_config:
                    Intent I4 =new Intent(Maps.this ,configuracoes.class);
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
        setContentView(R.layout.activity_maps);
        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setSelectedItemId(R.id.navigation_home);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);

/**********************************************************************/
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

    }


    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */



    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        LatLng viseu = new LatLng(40.656793, -7.913766);
        mMap.moveCamera(CameraUpdateFactory.newLatLng(viseu));
        maps();

    }


    public void maps(){

        String url = "http://193.137.7.33/~estgv16799/API4Pint/maps.php";

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
                            jsonArray = r.getJSONArray("maps");
                            for (int i = 0; i < jsonArray.length(); i++) {
                                JSONObject maps = jsonArray.getJSONObject(i);
                              x=  maps.getString("x");
                              y= maps.getString("y");
                              nome=  maps.getString("Nome");

                                LatLng posicao = new LatLng(Double.valueOf(x), Double.valueOf(y));

                                mMap.addMarker(new MarkerOptions().position(posicao).title(nome).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_ORANGE)));


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

        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(getApplicationContext());
        queue.add(postReq);

    }
}
