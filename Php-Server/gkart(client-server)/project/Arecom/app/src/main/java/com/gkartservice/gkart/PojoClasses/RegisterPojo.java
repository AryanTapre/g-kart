package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class RegisterPojo {

    @SerializedName("status")
    public String Status;
    @SerializedName("message")
    public String message;

    public String getStatus() {
        return Status;
    }

    public void setStatus(String status) {
        Status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
