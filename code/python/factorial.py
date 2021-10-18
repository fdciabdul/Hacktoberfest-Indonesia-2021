import argparse

args = argparse.ArgumentParser()
args.add_argument('--num', type=int, required=True)
arg=args.parse_args()
print(sum(range(arg.num, 0, -1)))
