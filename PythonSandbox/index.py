from flask import Flask,request,jsonify
from sandbox import Sandbox
from functools import partial
import time
import os

output_buffer = None
print_orig = print

app = Flask(__name__)

@app.after_request
def after_request(response):
    response.headers.add('Access-Control-Allow-Origin', '*')
    response.headers.add('Access-Control-Allow-Headers', 'Content-Type,Authorization')
    response.headers.add('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS')
    return response

def ob_start(fname):
    global print
    global output_buffer
    output_buffer = open(fname, 'w')
    print = partial(print_orig, file=output_buffer)
def ob_end():
    global output_buffer
    output_buffer.close()
    print = print_orig
def ob_get_contents(fname):
    global output_buffer
    data = open(fname, 'r').read()
    if os.path.exists(fname):
        os.remove(fname)
    return data

@app.route("/", methods=['POST'])
def hello():
    return "Welcome to Python Flask!"

@app.route("/sandbox/", methods=['POST'])
def sandbox():
    now = str(int(round(time.time() * 1000))) + '.txt'  # Create a random file on the fly
    code = request.form['myEditor']                     # Get the content from the post field
    ob_start(now)                                       # Start the output buffer
    exec(code)
    ob_end()
    return ob_get_contents(now)

if __name__ == "__main__":
    app.run()