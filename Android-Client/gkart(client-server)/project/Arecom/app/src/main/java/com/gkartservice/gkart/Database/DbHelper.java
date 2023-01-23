package com.gkartservice.gkart.Database;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

public class DbHelper extends SQLiteOpenHelper {

    public static final String DATABASE_NAME="cart";
    public static final String TABLE_NAME="product";
    public static final String P_ID="pid";
    public static final String P_NAME="pname";
    public static final String P_CODE="pcode";
    public static final String P_STATUS="pstatus";
    public static final String P_DATE="pdate";
    public static final String P_IMAGE="pimage";
    public static final String P_STOCK="pstock";
    public static final String P_PRICE="pprice";
    public static final String P_DESCRIPTION="pdescription";
    public static final String SERIAL_ID="sid";


    public DbHelper(Context context)
    {
        super(context,DATABASE_NAME,null,1);
    }


    @Override
    public void onCreate(SQLiteDatabase db) {
        String query = "create table product(sid integer primary key AUTOINCREMENT,pid text,pname text,pcode text,pstatus text" +
                ",pdate text,pimage text,pstock text,pprice text,pdescription text )";
        db.execSQL(query);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS product");
        onCreate(db);
    }

    public boolean insertProductCart(String p_id,String p_name,String p_code,String p_status,String p_date,String p_image,String p_stock,String p_price,String p_description) throws IOException
    {


        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();


        contentValues.put("pid",p_id);
        contentValues.put("pname",p_name);
        contentValues.put("pcode",p_code);
        contentValues.put("pstatus",p_status);
        contentValues.put("pdate",p_date);
        contentValues.put("pimage",p_image);
        contentValues.put("pstock",p_stock);
        contentValues.put("pprice",p_price);
        contentValues.put("pdescription",p_description);
        db.insert(TABLE_NAME,null,contentValues);
        return true;
    }

    public Cursor getProductCart()
    {
        SQLiteDatabase sqLiteDatabase = this.getReadableDatabase();
        Cursor cr = sqLiteDatabase.rawQuery("select * from product" ,null);
        return cr;
    }
    public void deleteItem(String id) {
        SQLiteDatabase db = getWritableDatabase();
        String whereClause = "sid=?";
        String whereArgs[] = {id};
        db.delete(TABLE_NAME, whereClause, whereArgs);
    }

    public Cursor getProduct(int id)
    {
        SQLiteDatabase sqLiteDatabase = this.getReadableDatabase();
        Cursor cr = sqLiteDatabase.rawQuery("select * from product where sid="+id,null);
        return cr;
    }

}
