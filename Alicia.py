import tkinter as tk
from tkinter import messagebox

def calcular_estres():
    total = sum([v.get() for v in respuestas])
    
    if total <= 7:
        mensaje = "✅ Nivel de estrés hídrico: BAJO.\n¡Buen manejo del agua!"
    elif total <= 11:
        mensaje = "⚠️ Nivel de estrés hídrico: MODERADO.\nSe recomienda revisar tu consumo."
    else:
        mensaje = "🚨 Nivel de estrés hídrico: ALTO.\n¡Es urgente tomar medidas!"
    
    messagebox.showinfo("Resultado", mensaje)

# Crear ventana
ventana = tk.Tk()
ventana.title("Gestión Hídrica - Cuestionario")
ventana.configure(bg="#ade8f4")
ventana.geometry("600x550")

# Título
tk.Label(ventana, text="💧 Cuestionario de Gestión Hídrica", font=("Arial", 18, "bold"), fg="#03045e", bg="#ade8f4").pack(pady=20)

# Preguntas
preguntas = [
    "1. ¿Con qué frecuencia riegas el cultivo?",
    "2. ¿Qué sistema de riego usas?",
    "3. ¿Cuánta agua consumes al día?",
    "4. ¿Tu fuente de agua es abundante?",
    "5. ¿Reutilizas el agua?"
]

opciones = [("Bajo", 1), ("Medio", 2), ("Alto", 3)]
respuestas = []

for pregunta in preguntas:
    frame = tk.Frame(ventana, bg="#ade8f4")
    frame.pack(anchor="w", padx=25, pady=5)

    tk.Label(frame, text=pregunta, bg="#ade8f4", fg="#0077b6", font=("Arial", 12, "bold")).pack(anchor="w")
    
    var = tk.IntVar()
    respuestas.append(var)
    
    for texto, valor in opciones:
        tk.Radiobutton(frame, text=texto, variable=var, value=valor, bg="#caf0f8", font=("Arial", 10)).pack(anchor="w")

# Botón calcular
tk.Button(ventana, text="Calcular Nivel de Estrés", command=calcular_estres,
          font=("Arial", 14), bg="#0077b6", fg="white").pack(pady=30)

ventana.mainloop()
