.data
	file: .asciiz "arq.txt"		# Nome do arquivo que vai ser criado caso não exista
	write: .asciiz "Eae txt"	# O que vai ser escrito dentro do arquivo
.text

	addi $v0, $zero , 13			# 13 é o codigo da syscall para abrir arquivo
	la $a0, file					# O priemiro argumento é a string que contém o nome do arquivo
	addi $a1, $zero, 1			# O segundo argumento é o tipo de uso (0 - apenas leitura, 1 - apenas escrita, 9 - append)
	add $a2, $zero, $zero		# O mars diz que ignora isso
	syscall							# Executa a syscall

	add $t0, $v0, $zero			# Após a chamada, $v0 contém o file descriptor para ter acesso ao arquivo, salvamos em $t0

	addi $v0, $zero, 15			# 15 é o codigo de escrita em arquivo
	add $a0, $t0, $zero			# O file descriptor é necessario para se ter acesso ao arquivo, como primeiro argumento
	la $a1, write					# O segundo argumento é o endereço ou label onde está armazendo a string que quer ser escrita
	addi $a2, $zero, 7			# O terceiro argumento é a quantidade de caracteres a serem escritos no arquivo a partir da string
	syscall							# Executa a syscall

	addi $v0, $zero, 16			# 16 é o codigo de fechar o arquivo
	add $a0, $zero, $t0			# Fechamos com o file descriptor como primeiro argumento
	syscall							# Executa a syscall
