package com.gkartservice.gkart.PojoClasses;

public class CartPojo {

    String pid;
    String pname;
    String pcode;
    String pstatus;
    String pdate;
    String pimage;
    String pstock;
    String pprice;
    String pdescription;
    int sid;

    public CartPojo(String pid, String pname, String pcode, String pstatus, String pdate, String pimage, String pstock, String pprice, String pdescription, int sid) {
        this.pid = pid;
        this.pname = pname;
        this.pcode = pcode;
        this.pstatus = pstatus;
        this.pdate = pdate;
        this.pimage = pimage;
        this.pstock = pstock;
        this.pprice = pprice;
        this.pdescription = pdescription;
        this.sid = sid;
    }

    public String getPid() {
        return pid;
    }

    public void setPid(String pid) {
        this.pid = pid;
    }

    public String getPname() {
        return pname;
    }

    public void setPname(String pname) {
        this.pname = pname;
    }

    public String getPcode() {
        return pcode;
    }

    public void setPcode(String pcode) {
        this.pcode = pcode;
    }

    public String getPstatus() {
        return pstatus;
    }

    public void setPstatus(String pstatus) {
        this.pstatus = pstatus;
    }

    public String getPdate() {
        return pdate;
    }

    public void setPdate(String pdate) {
        this.pdate = pdate;
    }

    public String getPimage() {
        return pimage;
    }

    public void setPimage(String pimage) {
        this.pimage = pimage;
    }

    public String getPstock() {
        return pstock;
    }

    public void setPstock(String pstock) {
        this.pstock = pstock;
    }

    public String getPprice() {
        return pprice;
    }

    public void setPprice(String pprice) {
        this.pprice = pprice;
    }

    public String getPdescription() {
        return pdescription;
    }

    public void setPdescription(String pdescription) {
        this.pdescription = pdescription;
    }

    public int getSid() {
        return sid;
    }

    public void setSid(int sid) {
        this.sid = sid;
    }
}
