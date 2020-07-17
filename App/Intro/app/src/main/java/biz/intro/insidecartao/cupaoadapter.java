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
import biz.intro.detalhescupao;

public class cupaoadapter extends RecyclerView.Adapter<cupaoadapter.viewholder>{

    private Context ma ;
    private ArrayList<cupaoclass> mcupao;
    public CardView cardView ;

    public  cupaoadapter(Context context , ArrayList<cupaoclass> cupao ){
        ma =context ;
        mcupao = cupao;

    }

    @NonNull
    @Override
    public cupaoadapter.viewholder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(ma).inflate(R.layout.cupao_item ,viewGroup ,false);
        return new viewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull cupaoadapter.viewholder viewholder, int i) {
       final cupaoclass p = mcupao.get(i);
        String img =p.getIMGCupao();
        String Titulo = p.getTituloCupao();
        String descricao = p.getDescricaoCupao();
        String datac = p.getDataFimCupao();
        String valec = p.getValeCupao();
        viewholder.titulo.setText(Titulo);
        viewholder.desc.setText(descricao);
        viewholder.data.setText(datac);
        viewholder.vale.setText("Vale "+valec+" %");

        viewholder.titulo.setTextColor(Color.parseColor(p.getCor()));
        viewholder.desc.setTextColor(Color.parseColor(p.getCor()));
        viewholder.data.setTextColor(Color.parseColor(p.getCor()));
        viewholder.vale.setTextColor(Color.parseColor(p.getCor()));

        Picasso.get().load(img).resize(2800, 1300).into(viewholder.la);

       cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(ma, detalhescupao.class);
                 i.putExtra("ID", p.IDCupao);
                ma.startActivity(i);
            }
        });

    }


    @Override
    public int getItemCount() {
        return mcupao.size();
    }

    public class viewholder extends RecyclerView.ViewHolder{
        public ImageView la;
        public TextView titulo ,data, vale, desc ;


        public viewholder(@NonNull View itemView) {
            super(itemView);
            la= itemView.findViewById(R.id.imgccupd);
            titulo =  itemView.findViewById(R.id.cTitulod);
            data =itemView.findViewById(R.id.cdatafimd);
            vale =itemView.findViewById(R.id.cvale);
            desc  =itemView.findViewById(R.id.cdesc);
            cardView =itemView.findViewById(R.id.cupaoid);

        }
    }




}
