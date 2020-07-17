package biz.intro;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;

public class Direitosdeutilizacao extends AppCompatActivity {
    RadioButton sim ,nao;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_direitosdeutilizacao);


         sim = (RadioButton)findViewById(R.id.rbsim);
         nao = (RadioButton)findViewById(R.id.rbnao);
        Button b =(Button) findViewById(R.id.button2) ;
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (sim.isChecked()){


                    Intent s = new Intent(getBaseContext(), Register.class);
                    startActivity(s);
                    finish();

                }else if(nao.isChecked()){

                    finishAffinity();
                    Intent s = new Intent(getBaseContext(), login.class);
                    startActivity(s);
                    finish();

                }

            }
        });

    }

}
