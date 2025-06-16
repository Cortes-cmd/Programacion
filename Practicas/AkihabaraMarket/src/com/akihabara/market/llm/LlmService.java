package com.akihabara.market.llm;

import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.Scanner;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;


public class LlmService {

	public  static void main (String[]args) {
		
		Scanner sc = new Scanner(System.in);
		

	
	
	 sc.close();
	
	}
	
	public String  sugerirNombreProducto( String tipo, String  franquicia) {
		
        String apiKey = "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";  
        String prompt = "Sugiere sólamente un nombre llamativo y original para un producto otaku del tipo" + tipo+" basado en la franquicia" + franquicia+"\n"+"No me introduzcas lo que dirás al principio de tu respuesta, empieza con el nombre directamente";

		
		try {
	
             HttpClient client = HttpClient.newHttpClient();


             JsonObject message = new JsonObject();
             message.addProperty("role", "user");
             message.addProperty("content", prompt);


             JsonArray messages = new JsonArray();
             messages.add(message);


             JsonObject body = new JsonObject();
             body.addProperty("model", "mistralai/mistral-7b-instruct:free");
             body.add("messages", messages);

             //URISyntaxException
             try {
             HttpRequest request = HttpRequest.newBuilder()
                     .uri(new URI("https://openrouter.ai/api/v1/chat/completions"))
                     .header("Authorization", "Bearer " + apiKey)
                     .header("Content-Type", "application/json")
                     .POST(HttpRequest.BodyPublishers.ofString(body.toString()))
                     .build();

             
             HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
             


             // Extraer el texto generado
             JsonObject json = JsonParser.parseString(response.body()).getAsJsonObject();
             String resultado = json
                     .getAsJsonArray("choices")
                     .get(0)
                     .getAsJsonObject()
                     .getAsJsonObject("message")
                     .get("content")
                     .getAsString();

            
             return resultado;
             
          
             }catch(URISyntaxException e) {
            	 System.out.println("Error"+e.getMessage());
            
             } catch(InterruptedException e) {
            	 System.out.println("Error"+e.getMessage());
             }catch(IOException e) {
            	 System.out.println("Error"+ e.getMessage());
             }

             
			
		} catch(Error e) {
			System.out.println("Error;"+e);
		}
		return null;
	}
}
