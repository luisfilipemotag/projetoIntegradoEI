package biz.intro.listcartao;

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
import biz.intro.cupao;

public class progadapter extends RecyclerView.Adapter<progadapter.viewholder>  {
    private Context ma ;
    private ArrayList<cartao> mcartao;
    public CardView cardView ;

    public  progadapter(Context context , ArrayList<cartao> cartao ){
        ma =context ;
        mcartao = cartao;

    }

    @NonNull
    @Override
    public viewholder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(ma).inflate(R.layout.list_item ,viewGroup ,false);
        return new viewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull viewholder viewholder, int i) {
        cartao p = mcartao.get(i);
        String img = p.getImg();
        String Titulo = p.getTitulo();
        String Subtitulo = p.getSubtitulo();
       final String id =p.getId();
        viewholder.titulo.setText(Titulo);
        viewholder.subtitulo.setText(Subtitulo);
        viewholder.titulo.setTextColor(Color.parseColor(p.getCor()));
        viewholder.subtitulo.setTextColor(Color.parseColor(p.getCor()));

        Picasso.get().load(img).resize(1310, 700).into(viewholder.la);

        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(ma, cupao.class);
               i.putExtra("ID", id);
                ma.startActivity(i);
            }
        });

    }


    @Override
    public int getItemCount() {
        return mcartao.size();
    }

    public class viewholder extends RecyclerView.ViewHolder{
        public ImageView la;
        public TextView titulo ;
        public TextView subtitulo ;

        public viewholder(@NonNull View itemView) {
            super(itemView);
            la= itemView.findViewById(R.id.imgccupd);
            titulo =  itemView.findViewById(R.id.Tituloc);
            subtitulo =itemView.findViewById(R.id.Subtituloc);
            cardView =itemView.findViewById(R.id.cardid);

        }
    }




}

