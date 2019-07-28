from flask import Flask, render_template

app = Flask(__name__)

@app.route("/")
def home():
    return render_template("home.html")

@app.route("/distancia")
def distancia():
    return render_template("distancia.html")

@app.route("/oraculo")
def oraculo():
    return render_template("oraculo.html")
    
if __name__ == "__main__":
    app.run(debug=True)