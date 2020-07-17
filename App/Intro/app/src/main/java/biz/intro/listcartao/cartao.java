package biz.intro.listcartao;
public class cartao {
    public String Titulo , Subtitulo ,img ,id , cor ;

    public cartao(String titulo, String subtitulo, String img, String id, String cor) {
        Titulo = titulo;
        Subtitulo = subtitulo;
        this.img = img;
        this.id = id;
        this.cor = cor;
    }

    public String getTitulo() {
        return Titulo;
    }

    public void setTitulo(String titulo) {
        Titulo = titulo;
    }

    public String getSubtitulo() {
        return Subtitulo;
    }

    public void setSubtitulo(String subtitulo) {
        Subtitulo = subtitulo;
    }

    public String getImg() {
        return img;
    }

    public void setImg(String img) {
        this.img = img;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }
}