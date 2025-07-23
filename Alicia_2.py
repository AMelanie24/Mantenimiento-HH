import tkinter as tk
from tkinter import messagebox

# Función principal que se llama al presionar el botón
def calcular_estres():
    respuestas_usuario = [v.get() for v in respuestas]
    
    if 0 in respuestas_usuario:
        messagebox.showwarning("Incompleto", "⚠️ Por favor responde TODAS las preguntas antes de continuar.")
        return

    total = sum(respuestas_usuario)
    bajas = respuestas_usuario.count(1)
    medias = respuestas_usuario.count(2)
    altas = respuestas_usuario.count(3)

    total_preguntas = len(respuestas)
    porcentaje_bajo = round((bajas / total_preguntas) * 100, 1)
    porcentaje_medio = round((medias / total_preguntas) * 100, 1)
    porcentaje_alto = round((altas / total_preguntas) * 100, 1)

    if total <= 7:
        nivel = "✅ Nivel de estrés hídrico: BAJO\n¡Buen manejo del agua!"
    elif total <= 11:
        nivel = "⚠️ Nivel de estrés hídrico: MODERADO\nRevisa tu consumo."
    else:
        nivel = "🚨 Nivel de estrés hídrico: ALTO\n¡Toma medidas urgentes!"

    resultado_label.config(text=nivel)
    estadisticas_label.config(text=f"""
📊 Estadísticas:
• Respuestas BAJAS: {bajas} ({porcentaje_bajo}%)
• Respuestas MEDIAS: {medias} ({porcentaje_medio}%)
• Respuestas ALTAS: {altas} ({porcentaje_alto}%)
""")

# Configuración de la ventana
ventana = tk.Tk()
ventana.title("Gestión Hídrica - Cuestionario")
ventana.configure(bg="#ade8f4")
ventana.geometry("700x650")

# Título
tk.Label(ventana, text="💧 Cuestionario de Gestión Hídrica", font=("Arial", 18, "bold"), fg="#03045e", bg="#ade8f4").pack(pady=20)

# Preguntas y opciones
preguntas = [
    "1. ¿Con qué frecuencia riegas el cultivo?",
    "2. ¿Qué sistema de riego usas?",
    "3. ¿Cuánta agua consumes al día?",
    "4. ¿Tu fuente de agua es abundante?",
    "5. ¿Reutilizas el agua?"
]

respuestas = []
opciones = [("Bajo", 1), ("Medio", 2), ("Alto", 3)]

for pregunta in preguntas:
    frame = tk.Frame(ventana, bg="#ade8f4")
    frame.pack(anchor="w", padx=25, pady=5)

    tk.Label(frame, text=pregunta, bg="#ade8f4", fg="#0077b6", font=("Arial", 12, "bold")).pack(anchor="w")
    
    var = tk.IntVar(value=0)  # valor por defecto = 0 (ninguna seleccionada)
    respuestas.append(var)
    
    for texto, valor in opciones:
        tk.Radiobutton(frame, text=texto, variable=var, value=valor, bg="#caf0f8", font=("Arial", 10)).pack(anchor="w")

# Botón para calcular
tk.Button(ventana, text="Calcular Nivel de Estrés", command=calcular_estres,
          font=("Arial", 14), bg="#0077b6", fg="white").pack(pady=20)

# Etiquetas donde se mostrará el resultado
resultado_label = tk.Label(ventana, text="", bg="#ade8f4", fg="#03045e", font=("Arial", 14, "bold"))
resultado_label.pack()

estadisticas_label = tk.Label(ventana, text="", bg="#ade8f4", fg="#023e8a", font=("Arial", 12), justify="left")
estadisticas_label.pack(pady=10)

ventana.mainloop()
