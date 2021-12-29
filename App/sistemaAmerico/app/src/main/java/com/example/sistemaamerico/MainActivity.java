package com.example.sistemaamerico;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private EditText ed1,ed2;
    private Button bt1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ed1 = (EditText) findViewById(R.id.textUsuario);
        ed2 = (EditText) findViewById(R.id.textContraseña);
        bt1 = (Button)   findViewById(R.id.button);
    }
    public void validar(View view){
        if(ed1.getText().toString().equals("admin1") && ed2.getText().toString().equals("123")){
            Toast.makeText(this,"Datos Ingresados", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(getApplicationContext(),Principal.class);
            startActivity(intent);
        }else{
            Toast.makeText(this,"Error en Datos Ingresados", Toast.LENGTH_LONG).show();
        }
    }
}