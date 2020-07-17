package biz.intro.insidecartao;

public class carimboclass {
    String IDCarimbo,CartaoCarimbo,TítuloCarimbo,DataFimCarimbo,DescricaoCarimbo,PremioCarimbo , imgcarimbo ,cor;

    public carimboclass(String IDCarimbo, String cartaoCarimbo, String títuloCarimbo, String dataFimCarimbo, String descricaoCarimbo, String premioCarimbo, String imgcarimbo, String cor) {
        this.IDCarimbo = IDCarimbo;
        CartaoCarimbo = cartaoCarimbo;
        TítuloCarimbo = títuloCarimbo;
        DataFimCarimbo = dataFimCarimbo;
        DescricaoCarimbo = descricaoCarimbo;
        PremioCarimbo = premioCarimbo;
        this.imgcarimbo = imgcarimbo;
        this.cor = cor;
    }

    public String getIDCarimbo() {
        return IDCarimbo;
    }

    public void setIDCarimbo(String IDCarimbo) {
        this.IDCarimbo = IDCarimbo;
    }

    public String getCartaoCarimbo() {
        return CartaoCarimbo;
    }

    public void setCartaoCarimbo(String cartaoCarimbo) {
        CartaoCarimbo = cartaoCarimbo;
    }

    public String getTítuloCarimbo() {
        return TítuloCarimbo;
    }

    public void setTítuloCarimbo(String títuloCarimbo) {
        TítuloCarimbo = títuloCarimbo;
    }

    public String getDataFimCarimbo() {
        return DataFimCarimbo;
    }

    public void setDataFimCarimbo(String dataFimCarimbo) {
        DataFimCarimbo = dataFimCarimbo;
    }

    public String getDescricaoCarimbo() {
        return DescricaoCarimbo;
    }

    public void setDescricaoCarimbo(String descricaoCarimbo) {
        DescricaoCarimbo = descricaoCarimbo;
    }

    public String getPremioCarimbo() {
        return PremioCarimbo;
    }

    public void setPremioCarimbo(String premioCarimbo) {
        PremioCarimbo = premioCarimbo;
    }

    public String getImgcarimbo() {
        return imgcarimbo;
    }

    public void setImgcarimbo(String imgcarimbo) {
        this.imgcarimbo = imgcarimbo;
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }
}
