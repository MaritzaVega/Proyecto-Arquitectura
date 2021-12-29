package com.example.sistemaamerico;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;

public class Principal extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_principal);
    }
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.principal,menu);
        return true;
    }

    public boolean onOptionsItemSelected(MenuItem item){
        int id = item.getItemId();

        if (id == R.id.item1){
            Intent intent1 = new Intent(getApplicationContext(), Empresa.class);
            startActivity(intent1);
        }else if (id == R.id.item2){
            Intent intent2 = new Intent(getApplicationContext(), Usuarios.class);
            startActivity(intent2);
        }else if (id == R.id.item3){
            Intent intent3 = new Intent(getApplicationContext(), Productos.class);
            startActivity(intent3);
        }else if (id == R.id.item4){
            Intent intent4 = new Intent(getApplicationContext(), Clientes.class);
            startActivity(intent4);
        }
        return super.onOptionsItemSelected(item);
    }




}