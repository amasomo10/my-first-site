import math



print("Here are my farm numbers")

action = int(input("Sales: "))

if  action >= 0:
    action = int(input("COGS: "))
    action = int(input("Expenses: "))
    action = int(input("DA: "))
    action = int(input("Interest: "))
    action = int(input("Taxes: "))

    results = ((((Sales - COGS) - Expenses) - DA) - Interest) - Taxes

    if results >0:
        print (f"Results are {results}")
        print("You are profitable")

    elif results <0:
        print (f"Results are {results}")
        print("You are in loss")

    else:
        print (f"Results are {results}")
        print("Do exercise again")
