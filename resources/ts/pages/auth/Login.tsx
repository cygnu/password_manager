import React from 'react'
import { useForm } from 'react-hook-form'
import * as yup from 'yup'
import { yupResolver } from '@hookform/resolvers/yup'
import { useSignIn } from '../../queries/AuthQuery'

const schema = yup
  .object({
    email: yup.string().email().max(10, 'Email is invalid').required('Required'),
    password: yup.string().min(6, 'Password should be longer than 6 characters').required('Required')
  })
  .required()

export const Login: React.FC = () => {
  const signIn = useSignIn()

  const { register } = useForm({
    resolver: yupResolver(schema)
  })

  const onSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault()
    signIn.mutate({ email: 'test@example.com', password: 'ee' })

    const validationError = await schema.validate({ email: 'test@example.com', password: 'ee' }).catch((err) => {
      return err
    })
    console.log(validationError.errors.message)
  }

  return (
    <form onSubmit={onSubmit}>
      <label htmlFor="login">Login</label>
      <input {...register('email')} type="text" />
      <label htmlFor="password">Password</label>
      <input {...register('password')} type="password" />
      <input type="submit" />
    </form>
  )
}
