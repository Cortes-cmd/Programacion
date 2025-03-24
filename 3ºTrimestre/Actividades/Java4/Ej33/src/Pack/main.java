package Pack;

public class main {

	public static void main (String[] args) {
		CuentaBancaria Account = new CuentaBancaria();
		
		Account.depositar(590);
		Account.retirar(589);
		System.out.print(Account.getSaldo());
	}

}
