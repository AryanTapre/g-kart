package com.gkartservice.gkart.Database;

import android.content.Context;
import android.content.SharedPreferences;
import android.widget.Toast;

public class SharedPrefManager {


    public static final String SP_COUPON_APP = "Gkart";
    public static final String SP_USER_ID = "user_id";
    public static final String SP_U_LOGIN = "uLogin";
    public static final String SP_USER_DATA = "user_data";


    SharedPreferences sp;
    SharedPreferences.Editor spEditor;

    public SharedPrefManager(Context context)
    {
        sp = context.getSharedPreferences(SP_COUPON_APP, Context.MODE_PRIVATE);
        spEditor = sp.edit();
    }

    public void saveSPString(String keySP, String value)
    {
        spEditor.putString(keySP, value);
        spEditor.commit();
    }

    public void saveSPInt(String keySP, int value)
    {
        spEditor.putInt(keySP, value);
        spEditor.commit();
    }

    public void saveSPBoolean(String keySP, boolean value)
    {
        spEditor.putBoolean(keySP, value);
        spEditor.commit();
    }

    public String getSpUserId()
    {
        return sp.getString(SP_USER_ID, null);
    }


    public String getSpULogin()
    {
        return sp.getString(SP_U_LOGIN, "");
    }

    public String getSpUserData()
    {
        return sp.getString(SP_USER_DATA, "");
    }

    public Boolean getUserLogin()
    {
        return sp.getBoolean(SP_U_LOGIN, false);
    }
}
