# import json
from flask import Flask,request,jsonify
from sandbox import Sandbox
app = Flask(__name__)
 
@app.route("/", methods=['POST'])
def hello():
    return "Welcome to Python Flask!"

@app.route("/sandbox/", methods=['POST'])
def sandbox():
    # editorContent =  request.form['myEditor']
    # content = request.form['myEditor']
    # print(content)
    # return jsonify(content)
    # print(jsonify({'status':'OK','user':request.form['myEditor']}))
    # return "editorContent"
    # response = app.response_class(
    #     response=json.dumps(request.form['myEditor']),
    #     status=200,
    #     mimetype='application/json'
    # )
    # return response
    s = Sandbox()
    code = request.form['myEditor']
    return s.execute(code)
    # return ""
    
if __name__ == "__main__":
    app.run()