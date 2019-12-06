class Sandbox(object):
    def execute(self, code_string):
        return exec(code_string)
        # try:
        #     return eval(code_string)
        # except Exception as e:
        #     return e