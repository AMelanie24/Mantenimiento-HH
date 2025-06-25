#!/bin/bash

# Archivo que se modificará en cada commit
FILE="fake_commits.txt"

# Configuración de Git (cambia 'Tu Nombre' y 'tu@email.com')
git config --global user.name "Erick"
git config --global user.email "michellerik96@gmail.com"

# Loop para generar commits en días pasados
for ((i=1; i<=30; i++)); do
    # Agrega texto aleatorio al archivo
    echo "Commit falso $(date +%s)" >> $FILE
    
    # Añade el archivo al staging area
    git add $FILE
    
    # Configura la fecha del commit (días hacia atrás)
    DATE=$(date -d "$i day ago" +"%Y-%m-%d %H:%M:%S")
    
    # Realiza el commit con la fecha modificada
    git commit -m "Commit falso $i" --date="$DATE"
    
    echo "Commit $i generado con fecha: $DATE"
done

# Sube los commits al repositorio remoto
git push origin main
