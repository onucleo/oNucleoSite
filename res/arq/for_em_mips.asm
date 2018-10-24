.data
	vetor: .word 1, 3, 4, 5, 8, 9
	tamanho: .word 6
.text
	#codigo de c para mips-assembly
	# int v[] = {1,3,4,5,8,9}
	# int soma = 0;
	# for(int i = 0; i < 6; i++){
	#	 soma = soma + v[i];
	# }


	la $t0, vetor    			# salva o endereço base do vetor em $t0
	la $t1, tamanho			# salva p endereço base do "vetor" tamanho em $t0
	lw $t1, 0($t1)				# carrega em $t1 o valor de fato (5 definido em .data) em $t1 novamente

	add $t2, $zero, $zero 	# i
	add $t3, $zero, $zero 	# soma

	loop:	bge $t2, $t1, exit	#	se $t2(i) for maior que $t1(tamanho)

	sll $t5, $t2, 2      	# i * 4
	add $t5, $t0, $t5     	# v + 4i
	lw $t4, 0($t5)       	# v[i]
	add $t3, $t3, $t4    	# soma = soma + v[i]
	addi $t2, $t2, 1     	# i++

	j loop						# volta pro laço loop

	exit: addi $v0, $zero, 1
	add $a0, $zero, $t3
	syscall

	nop					# encerra a execução
