.data
	file: .asciiz "arq.txt"		# Nome do arquivo que vai ser lido
	write: .asciiz ""			# Onde vai ser guardado o que foi lido do arquivo
.text


	addi $v0, $zero , 13		# 13 é o codigo da syscall para abrir arquivo
	la $a0, file				# O priemiro argumento é a string que contém o nome do arquivo
	addi $a1, $zero, 0		# O segundo argumento é o tipo de uso (0 - apenas leitura, 1 - apenas escrita, 9 - append)
	add $a2, $zero, $zero	# O mars diz que ignora isso
	syscall						# Executa a syscall

	add $t0, $v0, $zero		# Após a chamada, $v0 contém o file descriptor para ter acesso ao arquivo, salvamos em $t0

	addi $v0, $zero, 14		# 14 é o codigo de apenas leitura em arquivo
	add $a0, $t0, $zero		# File descriptor passado pra se ter acesso ao arquivo
	la $a1, write				# Endereço de destino do que foi lido do arquivo
	addi $a2, $zero, 8		# Quantidade de caracteres a serem lidos
	syscall						# Executa a syscall

	addi $v0, $zero, 16		# 16 é o codigo de fechar o arquivo
	add $a0, $zero, $t0		# Fechamos com o file descriptor como primeiro argumento
	syscall						# Executa a syscall

	addi $v0, $zero, 4		# 4 é o codigo de printar string
	la $a0, write				# passando como argumento a string a ser printada
	syscall						# Executa a syscall
