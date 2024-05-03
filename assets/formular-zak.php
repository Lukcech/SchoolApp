<form method="POST">
        <input  type="text" 
                name="first_name" 
                placeholder="Křestní jméno"
                value="<?= htmlspecialchars($first_name)  ?>"
                required>
                
        <br>
        
        <input  type="text" 
                name="second_name"   
                placeholder="Příjmení" 
                value="<?= htmlspecialchars($second_name)  ?>"
                required>
        <br>

        <input  type="number" 
                name="age" 
                placeholder="Věk" 
                value="<?= htmlspecialchars($age)  ?>"
                min="10" 
                required>
        <br>

        <textarea  name="life" placeholder="Podrobnosti o žákovi"><?= htmlspecialchars($life) ?></textarea>
        <br>
            
        <input  type="text" 
                    name="college" 
                    placeholder="Kolej"
                    value="<?= htmlspecialchars($college)  ?>" 
                    min="Kolej">
        <br>
        <input type="submit" value="Uložit">
    </form>