import ast
import copy

class Sandbox(object):
    def execute(self, code_string):
        self.exec_with_return(code_string)
        # exec(code_string)
        # try:
        #     eval('s = '+ code_string)
        #     return s
        # except Exception as e:
        #     return e
    def convertExpr2Expression(self, Expr):
        Expr.lineno = 0
        Expr.col_offset = 0
        result = ast.Expression(Expr.value, lineno=0, col_offset = 0)

        return result
    def exec_with_return(self, code):
        code_ast = ast.parse(code)

        init_ast = copy.deepcopy(code_ast)
        init_ast.body = code_ast.body[:-1]

        last_ast = copy.deepcopy(code_ast)
        last_ast.body = code_ast.body[-1:]

        exec(compile(init_ast, "<ast>", "exec"), globals())
        if type(last_ast.body[0]) == ast.Expr:
            return eval(compile(self.convertExpr2Expression(last_ast.body[0]), "<ast>", "eval"),globals())
        else:
            exec(compile(last_ast, "<ast>", "exec"),globals())