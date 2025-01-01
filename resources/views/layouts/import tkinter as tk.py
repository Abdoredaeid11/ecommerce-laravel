import tkinter as tk
from tkinter import ttk
from cryptography.fernet import Fernet
import hashlib


def caesar_cipher_encrypt(text, shift):
    result = ""
    for char in text:
        if char.isalpha():
            shift_base = 65 if char.isupper() else 97
            result += chr((ord(char) - shift_base + shift) % 26 + shift_base)
        else:
            result += char
    return result


def sha256_hash(text):
    return hashlib.sha256(text.encode()).hexdigest()


def encrypt_text():
    text = input_text.get()
    algorithm = algo_var.get()
    result = ""
    
    if algorithm == "Caesar Cipher":
        result = caesar_cipher_encrypt(text, 3)  # shift by 3
    elif algorithm == "SHA-256":
        result = sha256_hash(text)
    elif algorithm == "AES":
        # Example AES encryption (key should be predefined or entered)
        key = Fernet.generate_key()
        cipher = Fernet(key)
        result = cipher.encrypt(text.encode()).decode()

    output_text.set(result)


# GUI Setup
root = tk.Tk()
root.title("Security Algorithms GUI")

tk.Label(root, text="Enter Text:").pack(pady=5)
input_text = tk.StringVar()
tk.Entry(root, textvariable=input_text, width=40).pack(pady=5)

tk.Label(root, text="Select Algorithm:").pack(pady=5)
algo_var = tk.StringVar(value="Caesar Cipher")
ttk.Combobox(root, textvariable=algo_var, values=["Caesar Cipher", "SHA-256", "AES"]).pack(pady=5)

tk.Button(root, text="Encrypt", command=encrypt_text).pack(pady=10)

tk.Label(root, text="Output:").pack(pady=5)
output_text = tk.StringVar()
tk.Entry(root, textvariable=output_text, width=40, state="readonly").pack(pady=5)

root.mainloop()



