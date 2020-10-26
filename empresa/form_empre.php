<h1>Seja um cliente MART</h1>

<section id = "cadastro">
    <form action = "../empresa/processa.php" method = "POST" enctype="multipart/form-data">
        <div class="form-group col-md-6"">
            <label>
                Digite o CNPJ da empresa
            </label>
            
            <input class="form-control" type = "number" name = "cnpj" value = ""/>
            <label>
                Nome da empresa
            </label>
            
            <input type = "text" class="form-control" name = "nome" value = "" />
            
            <label>
                E-mail: 
            </label>
            
            <input type = "text" class="form-control" name = "email" value = "" />
            
            <label>
                Senha:
            </label>
            
            <input type = "password" name = "senha" value = "" class="form-control" />
            
            <br />
            
            <label>
                A empresa é fixa ou itinirante? (Para grupos artisticos, é recomendável que selecione a opção itinirante)
            </label>
            
            <br />
            
            <input type = "text" class="form-control" name = "localizacao" value = "Digite o endereço fixo:" />
            
            <br />
            
            Itinerante
            <input type = "radio" name = "localizacao" value = "Itinerante" class="form-control" />
            <br />
            
            <label>
                Cidade: 
            </label> 
            
            <input type = "text" name = "cidade" value = "" class="form-control"/>
            
            <br />
            
            <label>
                Tipos de eventos realizados:
                <br />
            </label>
            
            <br /> 

            <label>
			    Foto de perfil da empresa:
            </label>
            
            <input type="file" name="perfil" accept="image/*" class="form-control form-control-lg"/>
            
            <br />
            
            <label>
                Foto de capa da empresa:
            </label>
            
            <input type="file" name="capa" accept="image/*" class="form-control form-control-lg"/>
            
            <br />


            Teatro ou Stadup 
            <input type = "checkbox" class="form-control" name = "tipos" value = "Teatro_stadup" /> 
             Músicas 
            <input type = "checkbox" name = "editais" value = "Músicas" class="form-control" />
            Exposições
            <input type = "checkbox" name = "editais" value = "Exposições" class="form-control"/>
            Oficinas
            <input type = "checkbox" name = "editais" value = "oficinas" class="form-control" />
            <br />
            <input type = "submit" name = "submeter" value = "Enviar" class="form-control"/>
            <input type = "reset" name = "resetar" value = "Limpar" class="form-control"/>
        </div>
    <form>
</section>