<body>

<h1>Realize seu login</h1>

<form action = "verifica.php" method = "POST">

    <div class="form-group form-row">
        <div class = "form-group col-md-6">
            <div class = "form-group col-md-6">
                <label>
                    E-mail:
                </label>
                <input type  = "mail" class="form-control form-control-sm" name = "mail" value = "" style = "border: 3px solid black;" />
            </div>
            <div class = "form-group col-md-6">
                <label>
                    Senha
                </label>
                <input type = "password" class="form-control form-control-sm" name = "senha" value = "" style = "border: 3px solid black;"/>
            </div>
            <div class = "form-group col-md-6">
            
                <input type = "submit" class="form-control form-control-sm" name = "Submeter" value = "Logar" style = "border: 3px solid black;"/>
            </div>
            
            <div class = "form-group col-md-6">
        
                <input type = "reset" name = "resetar" value = "Limpar" class="form-control form-control-sm" style = "border: 3px solid black;"/>
            </div>
        </div>
    </div>
</form>

</body>