package biz.intro.insidecartao;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

import biz.intro.R;
import biz.intro.detalhescarimbo;
import biz.intro.detalhescupao;

public class carimboadapter  extends RecyclerView.Adapter<carimboadapter.viewholder> {

    private Context ma ;
    private ArrayList<carimboclass> mcarimbo;
    public CardView cardView ;

    public  carimboadapter(Context context , ArrayList<carimboclass> carimbo ){
        ma =context ;
        mcarimbo = carimbo;

    }

    @NonNull
    @Override
    public carimboadapter.viewholder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(ma).inflate(R.layout.carimbo_item ,viewGroup ,false);
        return new carimboadapter.viewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull carimboadapter.viewholder viewholder, int i) {
     final    carimboclass p = mcarimbo.get(i);
        String img =p.getImgcarimbo();
        String Titulo = p.getTítuloCarimbo();
        String fatafcar = p.getDataFimCarimbo();

       /* String datac = p.getDataFimCupao();
        String valec = p.getValeCupao();*/
        viewholder.titulo.setText(Titulo);
        viewholder.data.setText(fatafcar);

        viewholder.titulo.setTextColor(Color.parseColor(p.getCor()));
        viewholder.data.setTextColor(Color.parseColor(p.getCor()));

        Picasso.get().load(img).resize(2830, 1355).into(viewholder.la);

        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(ma, detalhescarimbo.class);
                i.putExtra("ID", p.getIDCarimbo());
                ma.startActivity(i);
            }
        });

    }


    @Override
    public int getItemCount() {
        return mcarimbo.size();
    }

    public class viewholder extends RecyclerView.ViewHolder{
        public ImageView la;
        public TextView titulo ,data ;


        public viewholder(@NonNull View itemView) {
            super(itemView);
            la= itemView.findViewById(R.id.imgccupd);
            titulo =  itemView.findViewById(R.id.cTitulod);
            data =itemView.findViewById(R.id.cdatafimd);

            cardView =itemView.findViewById(R.id.carimboid);

        }
    }




}
