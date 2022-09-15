from flask import Flask, render_template
import subprocess as sp
import os
STATIC_DIR = os.path.abspath('../static')

app = Flask(__name__, static_folder=STATIC_DIR)

@app.route("/")
def home() :
    # data = [
    #     ("01-01-2020", 20),
    #     ("02-01-2020", 10),
    #     ("03-01-2020", 2),
    #     ("04-01-2020", 8),
    #     ("05-01-2020", 25),
    #     ("06-01-2020", 1),
    #     ("07-01-2020", 13),
    #     ("08-01-2020", 2),
    #     ("09-01-2020", 10),
    #     ("10-01-2020", 12),
    #     ("11-01-2020", 15),
    #     ("12-01-2020", 17),
    #     ("13-01-2020", 11),
    #     ("14-01-2020", 19),
    #     ("15-01-2020", 23),
    #     ("16-01-2020", 30),
    # ]
    
    # labels = [row[0] for row in data]
    # values = [row[1] for row in data]

    # Untuk menjalankan file php
    out = sp.run(["php", "index.php"], stdout=sp.PIPE)
    return out.stdout

@app.route("/data_traffic")
def home2() :
    # data = [
    #     ("01-01-2020", 20),
    #     ("02-01-2020", 10),
    #     ("03-01-2020", 2),
    #     ("04-01-2020", 8),
    #     ("05-01-2020", 25),
    #     ("06-01-2020", 1),
    #     ("07-01-2020", 13),
    #     ("08-01-2020", 2),
    #     ("09-01-2020", 10),
    #     ("10-01-2020", 12),
    #     ("11-01-2020", 15),
    #     ("12-01-2020", 17),
    #     ("13-01-2020", 11),
    #     ("14-01-2020", 19),
    #     ("15-01-2020", 23),
    #     ("16-01-2020", 30),
    # ]
    
    # labels = [row[0] for row in data]
    # values = [row[1] for row in data]

    # Untuk menjalankan file php
    out = sp.run(["php", "data_traffic.php"], stdout=sp.PIPE)
    return out.stdout

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, threaded=True)