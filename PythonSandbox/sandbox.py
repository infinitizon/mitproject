class Sandbox(object):
    def execute(self, code_string):
        exec(code_string)
        # try:
        #     return eval(code_string)
        # except Exception as e:
        #     return e