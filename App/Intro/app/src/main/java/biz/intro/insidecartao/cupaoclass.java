package biz.intro.insidecartao;

public class cupaoclass {
    String IDCupao,ID_Cartao,TituloCupao,IMGCupao,ValeCupao,DataFimCupao,DescricaoCupao , cor;

    public cupaoclass(String IDCupao, String ID_Cartao, String tituloCupao, String IMGCupao, String valeCupao, String dataFimCupao, String descricaoCupao, String cor) {
        this.IDCupao = IDCupao;
        this.ID_Cartao = ID_Cartao;
        TituloCupao = tituloCupao;
        this.IMGCupao = IMGCupao;
        ValeCupao = valeCupao;
        DataFimCupao = dataFimCupao;
        DescricaoCupao = descricaoCupao;
        this.cor = cor;
    }

    public String getIDCupao() {
        return IDCupao;
    }

    public void setIDCupao(String IDCupao) {
        this.IDCupao = IDCupao;
    }

    public String getID_Cartao() {
        return ID_Cartao;
    }

    public void setID_Cartao(String ID_Cartao) {
        this.ID_Cartao = ID_Cartao;
    }

    public String getTituloCupao() {
        return TituloCupao;
    }

    public void setTituloCupao(String tituloCupao) {
        TituloCupao = tituloCupao;
    }

    public String getIMGCupao() {
        return IMGCupao;
    }

    public void setIMGCupao(String IMGCupao) {
        this.IMGCupao = IMGCupao;
    }

    public String getValeCupao() {
        return ValeCupao;
    }

    public void setValeCupao(String valeCupao) {
        ValeCupao = valeCupao;
    }

    public String getDataFimCupao() {
        return DataFimCupao;
    }

    public void setDataFimCupao(String dataFimCupao) {
        DataFimCupao = dataFimCupao;
    }

    public String getDescricaoCupao() {
        return DescricaoCupao;
    }

    public void setDescricaoCupao(String descricaoCupao) {
        DescricaoCupao = descricaoCupao;
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }
}
