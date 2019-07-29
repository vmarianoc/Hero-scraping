from flask import Flask, render_template, request
from wtforms import Form
from forms import DistanciaForm

app = Flask(__name__)


@app.route("/")
def home():
    return render_template("home.html")


@app.route("/distancia")
def distancia():
    form = DistanciaForm(request.form)
    
    if request.method == 'POST' and form.validate():
        print ("POST request and form is valid")
        features =  request.form['features']
        metodo = request.form['metodo']
        return render_template("distancia.html", features=features, metodo=metodo)

    else:

        return render_template("distancia.html", form=form)


@app.route("/oraculo")
def oraculo():
    return render_template("oraculo.html")
    
if __name__ == "__main__":
    app.run(debug=True)