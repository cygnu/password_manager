import React, { useEffect } from 'react'
import { useForm } from 'react-hook-form'
import { yupResolver } from '@hookform/resolvers/yup'
import * as yup from 'yup'
import axios from 'axios'

const schema = yup
  .object({
    email: yup.string().email().max(10, 'Email is invalid').required('Required'),
    password: yup.string().min(6, 'Password should be longer than 6 characters').required('Required')
  })
  .required()

export const Login: React.FC = () => {
  useEffect(() => {
    axios
      .post('api/login', {
        email: 'admin@example.com',
        password: '123456'
      })
      .then((response) => {
        console.log(response)
      })
  }, [])

  const {
    register,
    handleSubmit,
    formState: { errors }
  } = useForm({
    resolver: yupResolver(schema)
  })

  const onSubmit = (data: any) => console.log(data)

  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <label htmlFor="login">Login</label>
      <input {...register('email')} type="text" />
      <label htmlFor="password">Password</label>
      <input {...register('password')} type="password" />
      <input type="submit" />
    </form>
  )
}
