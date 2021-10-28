import random
import string

def rand_char(num=20): # parameter sebagai penentu panjang word
    # generate number
    def number_generator():
        numbers = []
        for i in range(0, 9):
            numbers.append(i)
        return numbers

    # generate alphabet
    def alphabet_generator():
        alphabets = list(string.ascii_lowercase)
        return alphabets

    number_list = number_generator()
    alphabet_list = alphabet_generator()

    # panjang word
    word_len = num

    # menentukan jumlah karakter alfabet dan number
    if word_len <= 5:
        alpha_total = random.randint(2, word_len-1)
    elif word_len > 5:
        alpha_total = random.randint(word_len-6,word_len-1)
    num_total = word_len - alpha_total

    # mengacak alphabet
    def alpha_randomizer():
        randomized_alpha = []
        for a in range(alpha_total):
            rand = random.randint(0, 25) # jumlah alfabet
            randomizing_alpha = alphabet_list[rand]
            randomized_alpha.append(randomizing_alpha)
        return randomized_alpha

    # mengacak nomor
    def num_randomizer():
        randomized_num = []
        for a in range(num_total):
            rand = random.randint(0, 8) # jumlah angka
            randomizing_num = number_list[rand]
            randomized_num.append(randomizing_num)
        return randomized_num

    randomized_alphabet = alpha_randomizer() # menghasilkan beberapa alfabet acak
    randomized_number = num_randomizer() # menghasilkan beberapa number acak

    word = []

    # menambah list word dengan jumlah index yang ditentukan
    for i in range(word_len):
        u = ""
        word.append(u)

    # variable untuk melakukan cek index berapa yang ditempati karakter
    filled_index_bynumber = []
    filled_index_byalpha = []

    # mengaplikasikan angka yang telah diacak kedalam list word dengan index acak
    for f in randomized_number:
        rand = random.randint(0,word_len-1)
        for a in word:
            if word[rand] != '':
                rand = random.randint(0,word_len-1)
            else:
                pass
        word[rand] = str(f)
        filled_index_bynumber.append(rand)

    # mengaplikasikan huruf yang telah diacak kedalama list word dengan index acak dan index yang tersisa
    for f in randomized_alphabet:
        rand = random.randint(0,word_len-1)
        for a in word:
            if word[rand] != '':
                rand = random.randint(0,word_len-1)
            else:
                pass
        word[rand] = str(f)
        filled_index_byalpha.append(rand)

    # mengecek apakah password ada yang kosong indexnya dan menambahkannya dengan karakter lain
    for i in range(word_len):
        indx = 0
        if word[indx] == "":
            def al():
                return alphabet_list[random.randint(0, 25)]
            def num():
                return number_list[random.randint(0, 9)]
            random_method_picker = [al(), num()]
            word[indx] = random_method_picker[random.randint(0,1)]
            indx += 1
        else:
            pass

    password_string = str("'" + str(word) + "'")
    result = password_string.replace("'", '').replace('[', '').replace(']', '').replace(', ', '')
    return result
    #########

# call the function
string = rand_char(25)

print(string)
