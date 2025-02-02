from flask_cors import CORS
from flask import Flask, request, jsonify
import requests


app = Flask(__name__)
CORS(app)


API_URL = "https://api.apis.net.pe/v2/reniec/dni"
API_TOKEN = "<apis-token-11834.pIniTDIwrwS2OWonT4L3tTd6O6oSLWTY>"

@app.route('/validar-dni', methods=['POST'])
def validar_dni():
    data = request.json
    dni = data.get('dni')

    if not dni or len(dni) != 8:
        return jsonify({"error": "DNI inválido"}), 400
    
    params = {
        "numero": dni,
        "token": API_TOKEN
    }

    try:
        response = requests.get(API_URL, params=params)
        if response.status_code == 200:
            datos = response.json()
            nombre_completo = f"{datos['nombres']} {datos['apellidoPaterno']} {datos['apellidoMaterno']}"
            return jsonify({"nombre_completo": nombre_completo})
        else:
            return jsonify({"error": "no se encontró el dni "}), 404
    except requests.exceptions.RequestException as e:
        return jsonify({"error": f"Error de conexión: {e}"}), 500
    

if __name__ == '__main__':
    app.run(debug=True)
