package biz.intro.notifiaccao;

public class notificacao {

    public String Texto;
    public String idcard ;
    public int id ;

    public notificacao(String texto, String idcard, int id) {
        Texto = texto;
        this.idcard = idcard;
        this.id = id;
    }
    public String getTexto() {
        return Texto;
    }

    public void setTexto(String texto) {
        Texto = texto;
    }

    public String getIdcard() {
        return idcard;
    }

    public void setIdcard(String idcard) {
        this.idcard = idcard;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }


}
