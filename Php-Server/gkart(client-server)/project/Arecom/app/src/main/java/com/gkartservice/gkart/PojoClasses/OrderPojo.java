package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class OrderPojo {

    @SerializedName("message")
    String message;
    @SerializedName("status")
    String status;

    public OrderPojo(String message, String status) {
        this.message = message;
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}
